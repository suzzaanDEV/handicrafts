<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Handicraft Store</title>
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        /* General Body Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header and Footer Styles */
        header, footer {
            background-color:  crimson; /* Dark Red */
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Contact Section Styles */
        .contact {
            padding: 40px 20px;
            background-color: #fff;
            text-align: center;
            overflow: hidden;
        }

        .contactBanner {
            margin-bottom: 40px;
            animation: fadeIn 2s ease-out;
        }

        .contactBanner h1 {
            font-size: 2.5rem;
            color:  crimson; /* Dark Red */
            margin-bottom: 10px;
            animation: slideIn 1s ease-out;
        }

        .contactBanner p {
            font-size: 1.2rem;
            color: #333;
            animation: fadeIn 2s ease-out 0.5s forwards;
        }

        .connect {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            animation: slideIn 2s ease-out;
        }

        .connectText {
            max-width: 600px;
            text-align: center;
            animation: fadeIn 2s ease-out;
        }

        .connectText h1 {
            font-size: 2rem;
            color:  crimson; /* Dark Red */
            margin-bottom: 10px;
        }

        .connectText p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 10px;
        }

        .connectText a {
            color:  crimson;
            text-decoration: none;
            font-weight: bold;
        }

        .connectText a:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .connectText {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <!-- Contact Section -->
    <div id="contact-us" class="contact">
        <div class="contactBanner">
            <h1>#Let's Connect</h1>
            <p>Share love! Express hope and have faith!</p>
        </div>
        <div class="connect">
            <div class="connectText">
                <h1>Visit Our Office or Contact Us Today</h1>
                <p>Address: Lalitpur, Nepal</p>
                <p>Contact: test@gmail.com</p>
                <p>Number: 9812345675</p>
                <p>Track us: <a href="https://map.google.com" target="_blank"><i>Location here</i></a></p>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
    <script src="indexx.js"></script>
</body>
</html>
