<!DOCTYPE html>
<html>

<head>
    <title>Sertifikat PKKMB</title>
    @vite('resources/css/app.css')
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
            /* Optional: Prevents scrollbars */
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the entire background */
            z-index: -1;
            /* Sends the image behind the content */
        }

        .content {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Centers the content both horizontally and vertically */
            font-size: 32px;
            text-align: center;
            /* Center text horizontally */
            width: 100%;
            /* Adjust width as needed */
            max-width: 800px;
            /* Set max-width if you need a specific width */
            box-sizing: border-box;
            /* Ensures padding and border are included in the element's total width and height */
        }

        .content h4 {
            margin-top: 0;
            margin-bottom: 5px;
            /* Small margin below h5 */
        }

        .content p {
            margin-top: 3px;
            /* Small margin above p */
            margin-bottom: 0;
            /* No margin below p */
        }
    </style>
</head>

<body>
    <img class="background-image" src="{{ base_path('resources/assets/sertif.png') }}" alt="Certificate Template">
    <div class="content">
        <h4>{{ $mahasiswa->nama_mahasiswa }}</h4>
        <p>{{ $mahasiswa->nama_prodi }}</p>
    </div>
</body>

</html>
