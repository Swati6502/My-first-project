<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register_login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image to text</title>
    <link rel="stylesheet" href="ocr1.css">
    <link rel="stylesheet" href="drag.css">
    
    <!-- Smoothness -->
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- OCR -->
    <!-- v2 -->
    <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>



</head>
<body>
    <section id="header">
        <div class="container">
            <img src="images/Rect_logo.png" class="logo" >
            <img src="images/Square_logo copy.png" class="logo_mobile" >

            <div class="header-text">
                <h1>IMAGE-TO-EDITABLE TEXT <BR> CONVERTER</h1>
                    <div class="line">
                        <span class="line-1"></span><br>
                        <span class="line-2"></span><br>
                        <span class="line-3"></span>
                    </div>

                    <h2>3 Simple steps:</h2>
                    <ol>
                        <li>Upload .png/.jpg/.pdf file  <i class="material-icons">upload</i></li>
                        <li>Click on convert  <i class="material-icons">hourglass_full</i></li>
                        <li>Edit the text according to your need  <i class="material-icons">edit</i></li>
                    </ol>

                <!-- <span class="square"></span> -->
                <div class="line">
                    <span class="line-3"></span><br>
                    <span class="line-2"></span><br>
                    <span class="line-1"></span><br>
                </div>
                <br><br>
                <div class="but">
                    <a class="button" href="#converter">Start converting</a>
                </div>
            </div>
        </div>
    </section>


    <nav id="sideNav">
        <ul>
            <li><a href="index.html" target="_blank">HOME</a></li>
            <li class="dropdown"><a href="#features">FEATURES <span class="fa fa-caret-down"></span></a>
                <ul>
                    <li><a href="ocr.html" target="_blank">IMAGE-TO-TEXT</a></li>
                    <li><a href="speech.html"target="_blank">SPEECH-TO-TEXT</a></li>
                </ul>
            </li>
            <li><a href="about.html" target="_blank">OUR TEAM</a></li>
            
            <form action="register_login.php" method="POST">
                <li><button 
                    style="padding-top: 100px; 
                    padding: 10px;
                    outline: none;
                    background-color: #f67c92;
                    border: none;
                    margin-left: -9;
                    margin: -19px -10px;
                    cursor: pointer;
                    font-family: 'Philosopher', sans-serif;
                    font-size: 16px;" 
                    
                    onmouseover="this.style.color='white'" onmouseout="this.style.color='black'"

                    id="form-btn" type="submit" >SIGN UP/ LOG IN
                </button></li>
            </form>

            <form action="logout.php" method="POST">
                <li><button 
                    style = "padding-top: 100px; 
                    padding: 10px;
                    outline: none;
                    background-color: #f67c92;
                    border: none;
                    margin-left: -9;
                    margin: -19px -10px;
                    cursor: pointer;
                    font-family: 'Philosopher', sans-serif;
                    font-size: 16px;" 

                    onmouseover="this.style.color='white'" onmouseout="this.style.color='black'"
                    
                    id="form-btn" type="submit">LOG OUT
                </button></li>
            </form>
        </ul>
    </nav>
    <img src="images/menu.png" id="menuBtn">


    
    <!-- converter -->
    <section id="converter">
        <div class="container course-row">
            <div class="course-left-col">
                <div class="course-text">
                    <h1>Upload Image here:</h1>
                    <div class="line">
                        <span class="line-1"></span><br>
                        <span class="line-2"></span><br>
                        <span class="line-3"></span>
                    </div>
                  
                    <br>


                  <!-- drag -->
                  <div class="drop-zone">
                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                    <input type="file" id="myfile" class="drop-zone__input"  accept=".jpg, .jpeg, .png">
                  </div>

                    <button onclick="convert()" class="common-btn"><a href="#converted">Convert</a></button>

                    <div class="line">
                        <span class="line-1"></span><br>
                        <span class="line-2"></span><br>
                        <span class="line-3"></span>
                    </div>

                </div>
            </div>
            
            <div class="course-right-col">
                <img src="images/uploadfile.png" >
            </div>
        </div>
    </section>


    <!-- convertedText -->
    <section id="converted">
        <div class="convertedText">
            <h1>Converted Text:</h1>
            <div class="line">
                <span class="line-1"></span><br>
                <span class="line-2"></span><br>
                <span class="line-3"></span>
            </div>


            <br>
            <div id="text" contenteditable="true">
                <p id="temptext" contenteditable="false">Your converted text will be displayed here</p>
                <p id="edittext"></p>
                </div>


                <div class="tooltip">
                    <button class="btn-copy" onclick="copycontent()" onmouseout="copied()">
                        <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                        Copy   
                        <i class="material-icons">content_copy</i>
                    </button>
                </div>
                <!-- or
                <div class="tooltip">
                    <button class="btn" id="btnSave" onclick="savefile()" onmouseout="copied()">
                        <span class="tooltiptext" id="myTooltip">Download as text file</span>
                        Save  <i class="material-icons">save_alt</i>
                    </button>
                </div> -->

            </div>


           

            <br>
            <div class="line">
                <span class="line-1"></span><br>
                <span class="line-2"></span><br>
                <span class="line-3"></span>
            </div>

    </section>

    
    <a href="index.html"  class="anchor-btn" target="_blank">Go to Home</a>




     <!-- footer -->
    <div class="footer-basic">
        <footer>
            <hr>
            <div class="social">
                <a href="https://www.instagram.com" target="_blank"><i class="icon ion-social-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="icon ion-social-linkedin"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="icon ion-social-twitter"></i></a>
                <a href="https://www.facebook.com" target="_blank"><i class="icon ion-social-facebook"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.html">Home</a></li>
                <li class="list-inline-item"><a href="#features">Services</a></li>
                <li class="list-inline-item"><a href="about.html">About</a></li>
                <li class="list-inline-item"><a href="#features">Features</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">OCR Analysis © 2021</p>
        </footer>
    </div>





    <!-- hamberg navbar--javascript -->
    <script>
        var menuBtn=document.getElementById("menuBtn");
        var sideNav=document.getElementById("sideNav");
        sideNav.style.right="-250px";
        menuBtn.onclick=function(){
            if(sideNav.style.right=="-250px"){
                sideNav.style.right="0";
            }
            else{
                sideNav.style.right="-250px";
            }
        }
        

        // All animations will take exactly 500ms
        var scroll = new SmoothScroll('a[href*="#"]', {
            speed: 1000,
            speedAsDuration: true
        });


        // ocr
        function convert(){
            var image= document.getElementById('myfile').value;
            var imagename = image.split("\\").pop();

            if(image)
            {
                document.getElementById('edittext').innerHTML = "Loading....... ";
                Tesseract.recognize(
                imagename,
                'eng',
                { 
                    logger: m => console.log(m) }
                    ).then(({ data: { text } }) => {
                    document.getElementById('edittext').innerHTML = text;
                })
                document.getElementById('temptext').innerHTML = " ";
            }
            else
            {
                alert("Kindly Upload image first!!!");
                document.getElementById('temptext').innerHTML = "Kindly Upload image first!!!";
            }
        }



        // copy 
        function copycontent()
        {
            const cb = navigator.clipboard;
            const paragraph = document.getElementById("edittext");
            // const paragraph = document.querySelector('textarea');

            cb.writeText(paragraph.innerText).then(() => alert('Text copied'));
        }
        function copied()
        {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copy to clipboard";
        }



        // save 
            // const downloadToFile = (content, filename, contentType) => {
            // const a = document.createElement('a');
            // const file = new Blob([content], {type: contentType});
            
            // a.href= URL.createObjectURL(file);
            // a.download = filename;
            // a.click();

            //     URL.revokeObjectURL(a.href);
            // };

            // var image= document.getElementById('myfile').value;
            // var imagename = image.split("\\").pop();


            // document.querySelector('#btnSave').addEventListener('click', () => {

            //     const textArea = document.querySelector('#edittext');
            //     // var textArea = document.getElementById("edittext").value;
            //     console.log(textArea.value);
            //     downloadToFile(textArea.value, 'text.txt', 'text/plain');
            // });
                
        
    </script>


    <!-- Drag and drop -->
    <script src="dragscript.js"></script>
    <script src="upload.js"></script>

    
</body>
</html>