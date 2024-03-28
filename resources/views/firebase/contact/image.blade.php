<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img {
            height: 200px;
            width: 200px;
            border: 2px black solid;
        }
    </style>
</head>

<body>
    <label>Image Name</label> <input type="text" id="namebox"> <label id="extlab"></label> <br> <br>
    <img id="myimg"> <label id="upprogress"></label> <br> <br>

    <button id="selbtn">Select Image</button>
    <button id="upbtn">Upload Image</button>
    <button id="downbtn">Retrieve Image</button>

    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js";

        // Initialize Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyAl4gTYNu0DbfR961joucQnGGmsO39SVss",
            authDomain: "testlaravel-8c5b7.firebaseapp.com",
            projectId: "testlaravel-8c5b7",
            storageBucket: "testlaravel-8c5b7.appspot.com",
            messagingSenderId: "286128112173",
            appId: "1:286128112173:web:ca77c3b1da2041db786ea4"
        };

        const app = firebase.initializeApp(config);

        import {
            getStorage,
            ref as sRef,
            uploadBytesResumable,
            getDownloadURL
        } from "https://www.gstatic.com/firebasejs/7.14.0/firebase-storage.js";

        import {
            getDatabase,
            ref,
            set,
            child,
            get,
            update,
            remove
        } from "https://www.gstatic.com/firebasejs/7.14.0/firebase-databse.js";
        const realdb = getDatabase();

        var files = [];
        var reader = new FileReader();

        var namebox = document.getElementById("namebox");
        var extlab = document.getElementById("extlab");
        var myimg = document.getElementById("myimg");
        var proglab = document.getElementById("upprogress");
        var SelBtn = document.getElementById("selbtn");
        var UpBtn = document.getElementById('upbtn');
        var DownBtn = document.getElementById('downbtn');

        var input = document.createElement('input');
        input.type = 'file';

        input.onchange = e => {
            files = e.target.files;

            var extention = GetFileExt(files[0]);
            var name = GetFileName(files[0]);

            namebox.value = name;
            extlab.innerHTML = extention;

            reader.readAsDataURL(files[0]);
        }

        reader.onload = function() {
            myimg.src = reader.result;
        }

        SelBtn.onclick = function() {
            input.click();
        }

        function GetFileExt(file) {
            var temp = file.name.split('.');
            var ext = temp.slice((temp.length - 1), (temp.length));
            return '.' + ext[0];
        }

        function GetFileName(file) {
            var temp = file.name.split('.');
            var fname = temp.slice(0, -1).join('.');
            return fname;
        }

        async function UploadProcess() {
            var ImgToUpload = files[0];

            var ImgName = namebox.value + extLab.innerHTML;

            if (!ValidateName(ImgName)) {
                alert('Name contains invalid characters');
            }

            const metaData = {
                contentType: ImgToUpload.type
            }

            const storage = getStorage();

            const storageRef = sRef(storage, "Images/" + ImgName);

            const UploadTask = uploadBytesResumable(storageRef, ImgToUpload, metaData);

            UploadTask.on('state-changed', (snapshot) => {
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    proglab.innerHTML = "Upload" + progress + "%";

                },

                (error) => {
                    alert("error: Image not uploaded");
                },

                () => {
                    getDownloadURL(UploadTask.snapshot.ref).then((downloadURL) => {
                        console.log(downloadURL);
                    });
                }
            );
        }

        function SaveURLtoRealtimeDB(URL) {
            var name = namebox.value;
            var ext = extlab.innerHTML;

            set(ref(realdb, "ImagesLinks/" + name), {
                ImageName: (name + ext),
                ImgURL: URL
            });
        }

        function GetURLfromRealtimeDB() {
            var name = namebox.value;

            var dbRef = ref(realdb);

            get(child(dbRef, "ImagesLinks/" + name)).then((snapshot) => {
                if (snapshot.exists()) {
                    myimg.src = snapshot.val().ImgURL;
                }
            });
        }

        function ValidateName() {
            var regex = /[\.#$\[\]]/
            return !(regex.test(namebox.value));
        }

        UpBtn.onclick = UploadProcess;
        DownBtn.onclick = GetURLfromRealtimeDB;
    </script>
</body>

</html>

<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
        <th scope="col">Author</th>
    </tr>
</thead>
<tbody>
    @forelse($reference as $key => $item)
        <tr>
            <td scope='col'> {{ $item['id'] }} </td>
            <td scope='col'> {{ $item['title'] }} </td>
            <td scope='col'> {{ $item['category'] }} </td>
            <td scope='col'> {{ $item['description'] }} </td>
            <td scope='col'> {{ $item['author'] }} </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">No Record Found</td>
        </tr>
    @endforelse
</tbody>



function showDummyCars() {
    document.getElementById('dashboardContent').style.display = 'none';
    document.getElementById('CarsContent').style.display = 'none';
    document.getElementById('dummyCarsContent').style.display = 'block';

    document.getElementById('dashboardLink').classList.remove('active');
    document.getElementById('CarsLink').classList.remove('active');
    document.getElementById('dummyCarsLink').classList.add('active');
};