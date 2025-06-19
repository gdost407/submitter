<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Submitter Contact</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/logo.png');?>">

    <!-- STYLES -->

    <style {csp-style-nonce}>
      * {
        transition: background-color 300ms ease, color 300ms ease;
      }
      *:focus {
        background-color: rgba(221, 72, 20, 0.1);
        color: rgba(221, 72, 20, 1);
        outline: none;
      }
      html, body {
        color: rgba(33, 37, 41, 1);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
        font-size: 16px;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
      }
      header {
        background-color: rgba(247, 248, 249, 1);
        padding: .4rem 0 0;
      }
      .menu {
        padding: .4rem 2rem;
      }
      header ul {
        border-bottom: 1px solid rgba(242, 242, 242, 1);
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
        text-align: right;
      }
      header li {
        display: inline-block;
      }
      header li a {
        border-radius: 5px;
        color: rgba(0, 0, 0, .5);
        display: block;
        height: 44px;
        text-decoration: none;
      }
      header li.menu-item a {
        border-radius: 5px;
        margin: 5px 0;
        height: 38px;
        line-height: 36px;
        padding: .4rem .65rem;
        text-align: center;
      }
      header li.active a {
        background-color: rgba(221, 72, 20, .2);
        color: rgba(221, 72, 20, 1);
      }
      header li.menu-item a:hover,
      header li.menu-item a:focus {
        background-color: rgba(221, 72, 20, .2);
        color: rgba(221, 72, 20, 1);
      }
      header .logo {
        float: left;
        height: 44px;
        padding: .8rem .5rem;
      }
      header .menu-toggle {
        display: none;
        float: right;
        font-size: 2rem;
        font-weight: bold;
      }
      header .menu-toggle button {
        background-color: rgba(221, 72, 20, .6);
        border: none;
        border-radius: 3px;
        color: rgba(255, 255, 255, 1);
        cursor: pointer;
        font: inherit;
        font-size: 1.3rem;
        height: 36px;
        padding: 0;
        margin: 11px 0;
        overflow: visible;
        width: 40px;
      }
      header .menu-toggle button:hover,
      header .menu-toggle button:focus {
        background-color: rgba(221, 72, 20, .8);
        color: rgba(255, 255, 255, .8);
      }
      header .heroe {
        margin: 0 auto;
        max-width: 1100px;
        padding: 1rem 1.75rem 1.75rem 1.75rem;
      }
      header .heroe h1 {
        font-size: 2.5rem;
        font-weight: 500;
      }
      header .heroe h2 {
        font-size: 1.5rem;
        font-weight: 300;
      }
      section {
        margin: 0 auto;
        max-width: 1100px;
        padding: 2.5rem 1.75rem 3.5rem 1.75rem;
      }
      section h1 {
        margin-bottom: 2.5rem;
      }
      section h2 {
        font-size: 120%;
        line-height: 2.5rem;
        padding-top: 1.5rem;
      }
      section pre {
        background-color: rgba(247, 248, 249, 1);
        border: 1px solid rgba(242, 242, 242, 1);
        display: block;
        font-size: .9rem;
        margin: 2rem 0;
        padding: 1rem 1.5rem;
        white-space: pre-wrap;
        word-break: break-all;
      }
      section code {
        display: block;
      }
      section a {
        color: rgba(221, 72, 20, 1);
      }
      section svg {
        margin-bottom: -5px;
        margin-right: 5px;
        width: 25px;
      }
      .further {
        background-color: rgba(247, 248, 249, 1);
        border-bottom: 1px solid rgba(242, 242, 242, 1);
        border-top: 1px solid rgba(242, 242, 242, 1);
      }
      .further h2:first-of-type {
        padding-top: 0;
      }
      .svg-stroke {
        fill: none;
        stroke: #000;
        stroke-width: 32px;
      }
      footer {
        background-color: rgba(221, 72, 20, .8);
        text-align: center;
      }
      footer .environment {
        color: rgba(255, 255, 255, 1);
        padding: 2rem 1.75rem;
      }
      footer .copyrights {
        background-color: rgba(62, 62, 62, 1);
        color: rgba(200, 200, 200, 1);
        padding: .25rem 1.75rem;
      }
      @media (max-width: 629px) {
        header ul {
          padding: 0;
        }
        header .menu-toggle {
          padding: 0 1rem;
        }
        header .menu-item {
          background-color: rgba(244, 245, 246, 1);
          border-top: 1px solid rgba(242, 242, 242, 1);
          margin: 0 15px;
          width: calc(100% - 30px);
        }
        header .menu-toggle {
          display: block;
        }
        header .hidden {
          display: none;
        }
        header li.menu-item a {
          background-color: rgba(221, 72, 20, .1);
        }
        header li.menu-item a:hover,
        header li.menu-item a:focus {
          background-color: rgba(221, 72, 20, .7);
          color: rgba(255, 255, 255, .8);
        }
      }
    </style>
  </head>
  <body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

      <div class="menu">
        <ul>
          <li class="logo">
            <a href="<?= base_url();?>">
              <span style="font-size: 18px; font-weight: bold; color: black;">SUBM</span>
              <span style="font-size: 18px; font-weight: bold; color: red;">I</span>
              <span style="font-size: 18px; font-weight: bold; color: purple;">TTER</span>
            </a>
          </li>
          <li class="menu-toggle">
            <button id="menuToggle">&#9776;</button>
          </li>
          <li class="menu-item hidden"><a href="<?= base_url();?>">Home</a></li>
          <li class="menu-item hidden"><a href="<?= base_url('docs');?>">Docs</a></li>
          <li class="menu-item hidden"><a href="<?= base_url('examples');?>">Examples</a></li>
          <li class="menu-item hidden active"><a href="<?= base_url('contact');?>">Contact</a></li>
        </ul>
      </div>

      <div class="heroe">

        <h1 style="text-align: center;">
          <span style="color: black;">SUBMITTER</span> 
          <!-- <span style="color: red;">to</span>  -->
          <span style="color: purple;">CONTACT</span>
        </h1>
        <p style="text-align: center;">If you have any questions or suggestions, please contact me at <a href="mailto:info@aniketgolhar.in">info@aniketgolhar.in</a></p>
      </div>

    </header>

    <!-- CONTENT -->

    <section>
      
      <div class="contact-wrapper">
        <div class="contact-box">
          <h2>Get In Touch</h2>
          <p>
            Got feedback, ideas, or issues?<br><br> We’re building <span style="font-size: 18px; font-weight: bold; color: black;">SUBM</span>
            <span style="font-size: 18px; font-weight: bold; color: red;">I</span>
            <span style="font-size: 18px; font-weight: bold; color: purple;">TTER</span> for you. Send us a message and let’s make it better together.
          </p>
        </div>

        <div class="contact-box" style="box-shadow: 0 0 10px rgba(0,0,0,0.06);">
          <form action="" method="post" id="contact-form">
            <label for="fname">Full Name</label>
            <input type="text" id="fname" name="full_name" placeholder="Your full name.." required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="example@email.." required>

            <label for="mobile">Mobile</label>
            <input type="tel" id="mobile" name="mobile" placeholder="+91 1234567890.." required>

            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Write something.." required></textarea>

            <input type="hidden" name="submitter_replyto" value="true">
            <input type="hidden" name="submitter_subject" value="Query from SUBMITTER Contact Page">
            <input type="hidden" name="submitter_cc" value="golharaniket07@gmail.com">
            <input type="hidden" name="submitter_template" value="badge">
            <input type="submit" value="Submit">
          </form>
          <div id="response" style="text-align: center; padding: 10px; margin-top: 10px; border-radius: 5px;">here is my response</div>
        </div>
      </div>

      <style>
        .contact-wrapper {
          display: flex;
          flex-wrap: wrap;
          gap: 30px;
          width: 100%;
          justify-content: center;
          box-sizing: border-box;
        }

        .contact-box {
          width: 48%;
          background: #fff;
          padding: 25px;
          border-radius: 10px;
          min-width: 300px;
          box-sizing: border-box;
        }

        @media (max-width: 768px) {
          .contact-box {
            width: 100%; /* Stack on mobile */
          }
        }
        
        .contact-box h2 {
          margin-top: 0;
          color: #222;
        }

        .contact-box p {
          font-size: 15px;
          color: #555;
        }

        .contact-box form label {
          display: block;
          margin-top: 15px;
          font-weight: 600;
          color: #333;
        }

        .contact-box input[type="text"],
        .contact-box input[type="email"],
        .contact-box input[type="tel"],
        .contact-box select,
        .contact-box textarea {
          width: 90%;
          padding: 10px;
          margin-top: 5px;
          border: 1px solid #ccc;
          border-radius: 6px;
          font-size: 15px;
          resize: vertical;
        }

        .contact-box textarea {
          min-height: 150px;
        }

        .contact-box input[type="submit"] {
          background-color: rgba(221, 72, 20, 0.1);
          color: rgba(221, 72, 20, 1);
          border: none;
          padding: 12px 20px;
          font-size: 16px;
          border-radius: 6px;
          margin-top: 20px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        .contact-box input[type="submit"]:hover {
          background-color: rgba(221, 72, 20, 0.4);
        }

        #response{
          display: none;
        }
      </style>

    </section>

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer>
      <div class="environment">
        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>
      </div>

      <div class="copyrights">

        <p>&copy; <?= date('Y') ?> <span style="font-weight: bold; color: white;">SUBM</span><span style="font-weight: bold; color: red;">I</span><span style="font-weight: bold; color: pink;">TTER</span>. Design and developed by <a href="https://aniketgolhar.in" target="_blank" style="color: white; text-decoration: none;">Aniket Golhar</a>.</p>

      </div>

    </footer>

    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      $('#contact-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?= base_url('v1/61eff4d4cbe2d093971a59b04d490348'); ?>',
          method: 'POST',
          contentType: false,
          cache: false,
          processData: false,
          data: new FormData(this),
          success: function(response) {
            if(response.status == true){
              $('#response').show();
              $('#response').html('Thank your for reaching out!').css({'background-color': 'rgba(46, 155, 3, .1)', 'color': 'rgb(46, 155, 3)'});
            }else{
              $('#response').show();
              $('#response').html('Something went wrong!').css({'background-color': 'rgba(221, 72, 20, .1)', 'color': 'rgb(221, 72, 20)'});
            }
          }
        });
      });
    </script>

    <script {csp-script-nonce}>
      document.getElementById("menuToggle").addEventListener('click', toggleMenu);
      function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
          var menuItem = menuItems[i];
          menuItem.classList.toggle("hidden");
        }
      }
    </script>
  
  </body>
</html>
