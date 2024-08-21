<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Handicraft Store</title>
    <link rel="stylesheet" href="Connect.css">
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

        /* About Section Styles */
        .about {
            padding: 40px 20px;
            background-color: #fff;
            text-align: center;
            overflow: hidden;
        }

        .aboutText {
            margin-bottom: 40px;
            animation: fadeIn 2s ease-out;
        }

        .aboutText h1 {
            font-size: 2.5rem;
            color:  crimson; /* Dark Red */
            margin-bottom: 10px;
            animation: slideIn 1s ease-out;
        }

        .aboutText p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #333;
            animation: fadeIn 2s ease-out 0.5s forwards;
        }

        .aboutus {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            animation: slideIn 2s ease-out;
        }

        .aboutus img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .aboutus img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .dumiText {
            max-width: 600px;
            text-align: left;
        }

        .dumiText h1 {
            font-size: 2rem;
            color:  crimson; /* Dark Red */
            margin-bottom: 10px;
        }

        .dumiText p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
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
            .aboutus {
                flex-direction: column;
            }

            .dumiText {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <!-- ABOUT -->
    <div class="about">
        <div class="aboutText">
            <h1>#More of Us...</h1>
            <p>Spread love, joy, and hope through the gift of skills, experiences, knowledge, and power.</p>
        </div>

        <div class="aboutus">
            <img src="https://images.unsplash.com/photo-1690540791993-99ed6e0790d6?q=80&w=2016&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Handicraft Image">
            <div class="dumiText">
                <h1>Who We Are</h1>
                <p> Handicraft is a virtual store providing a variety of products in a systematic and efficient manner. We offer ornaments, bags, gifts, and decorations online, allowing customers to order with ease. Our mission is to design, develop, and enhance systems that address challenges, deliver exceptional user experiences, ensure security, and maintain competitiveness in the e-commerce landscape. We strive to produce more handmade products and extend our reach to both local and international markets.</p>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
    <script src="indexx.js"></script>
</body>
</html>
