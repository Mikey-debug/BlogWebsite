<?php 
session_start();

echo '<nav class="navbar">
        <a href="/blog/ "><img src="img/logo.png" class="logo" alt=""></a>
        <ul class="links-container">
            <li class="link-item"><a href="/blog/" class="link">home</a></li>
            <li class="link-item"><a href="/blog/contact" class="link">Contact Us</a></li>
            <li class="link-item"><a href="/blog/about" class="link">About Us</a></li>';
            if(isset($_SESSION['loggedin'])){
                echo '<li class="link-item"><a href="/blog/editor" target="_blank" class="link">editor</a></li>';
            }
            echo'
        </ul>
    </nav>
    ';

?>