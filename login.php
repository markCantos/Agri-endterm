<php 
$session_start()
if( )

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="user-login.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo_3">
                <img src="icons/logo(1)(1).png" alt="AGRI Logo">
            </div>
            <div class="nav-links">
                <a href="#home">HOME</a>
                <a href="#contact">CONTACT US</a>
                <a href="#privacy">PRIVACY AND POLICY</a>
            </div>
            <div class="menu-icon" aria-label="Toggle menu">☰</div>
        </nav>
    </header>
    
        <main>
            <div class="login-container">
                <div class="logo">
                    <img src="img/agriLogo(1)(1).png" alt="AGRI Logo">
                </div>
                <div class="welcs">
                    <h2>Welcome!</h2>
                </div>
                <form id="loginForm" action="login-process.php" method="post">
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                        <span class="toggle-password" onclick="togglePassword()">👁️</span>    
                    </div>

                     <button type="submit" class=" create">LogIn</button>
                </form>    
                <footer class="logins">
            <p>&copy; 2024 agri. All Rights Reserved.</p>
        </footer>
    
            </div>
            <img src="img/farmer-7788810_1280.webp" class="right" alt="">
        </main>
    
        
    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
        const menuIcon = document.querySelector('.menu-icon');
        const navLinks = document.querySelector('.nav-links');
    
        menuIcon.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            
            // Toggle aria-expanded attribute
            const isExpanded = navLinks.classList.contains('active');
            menuIcon.setAttribute('aria-expanded', isExpanded);
        });
    
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!navLinks.contains(event.target) && !menuIcon.contains(event.target)) {
                navLinks.classList.remove('active');
                menuIcon.setAttribute('aria-expanded', 'false');
            }
        });
    
      
    });


    // password hide 

    function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }

        document.getElementById('password').addEventListener('input', function() {
            const toggleButton = document.querySelector('.toggle-password');
            if (this.value.length > 0) {
                toggleButton.style.display = 'inline';
            } else {
                toggleButton.style.display = 'none';
            }
        });

        </script>
    
</body>
</html>


