<!DOCTYPE>
<html>
    <head>
    	<title>Maryland Meshnet</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/icon_16.png">
    </head>
    <body>
    	<div class="center">
        	<?php require("header.php"); ?>
            <div class="sidebar_l">
            	<div class="sidebar">
                	<hr>
                    <p>
                    Hello there. We are a group of people <!--, amateurs, professionals, students, parents?--> 
                    dedicated to reforming the Internet, and rebuilding it from the ground up so that it can be 
                    brought to <i>everyone</i>.
                    </p>
					<p>
					We believe knowledge, and information, 
                    and communication should be free, open, and universal. 
                    No price can be put on the technology that has allowed collaboration 
                    and sharing across the world.
					</p>
					<p>
					No entity should have the power to control what can be said, 
                    or to whom, across the Internet. That is why we want to put the 
                    Internet in the hands of the people - in your hands, and in your friends' 
                    hands, and in your neighbors' hands.
					</p>
					<p>
					That's why we're building a <a href="faq.php#meshnet">Meshnet</a>.
					</p>
                    <hr>
                </div>
            </div>
            <div class="sidebar_r">
            	<div class="sidebar">
                	<hr>
                    <p>
                	<ul>
                    	<a href="http://www.reddit.com/r/marylandmesh/"><li>/r/marylandmesh</li></a>
                        <a href="https://wiki.projectmeshnet.org/Maryland_Mesh"><li>Wiki</li></a>
                        <a href="https://plus.google.com/communities/100874292106037502249"><li>Google+</li></a>
                        <a href="http://maryland.ninux.org/"><li>Nodeshot</li></a>
                        <hr>
						<a href="/contact.php"><li>Contact Us</li></a>
						<a href="/faq.php"><li>FAQ</li></a>
                    </ul>
                    </p>
                    <hr>
                </div>
            </div>
            <div class="wrap">
            	<?php
					include_once "blog/markdown.php";
					$files = glob('blog/posts/*.{md}', GLOB_BRACE);
					foreach (array_reverse($files) as $file) {
						$name = substr($file, 6,-3);
						$contents = file_get_contents($file);
						
						$lines = explode("\n", $contents);
						$date = $lines[0];
						$time = $lines[1];
						$author = $lines[2];

						$lines[0] = "";
						$lines[1] = "";
						$lines[2] = "";
						$contents = implode("\n", $lines);
						
						echo '<div class="post" id="'.$name.'">';
						echo '<div class="date">'.$date.'</div>';
						echo '<div class="time">'.$time.'</div>';
						echo Markdown($contents);
						echo '<div class="author">Posted by '.$author.'.</div>';
						echo '</div>';
						break;
					}
				?>
            <hr>
            <?php require("footer.php"); ?>
            </div>
        </div>        
    </body>
</html>