<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Submitter Example</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Description for Form Examples -->
    <meta name="description" content="Explore live examples of HTML forms integrated with SUBMITTER backend. Try out different input types, templates, file uploads, and submission formats.">

    <meta name="keywords" content="submit, submitter, form examples, live html form, submitter form demo, form submit backend demo, file upload form, form with webhook, html form with cc, submitter integration demo">

    <meta name="robots" content="index, follow">
    <meta name="author" content="Aniket Golhar">

    <!-- Open Graph -->
    <meta property="og:title" content="Form Examples - SUBMITTER Live Demos">
    <meta property="og:description" content="See how SUBMITTER works with real-world HTML forms. Try live examples for input fields, templates, autoresponders, and file uploads.">
    <meta property="og:image" content="https://submitter.aniketgolhar.in/assets/submitter-logo.png">
    <meta property="og:url" content="<?= base_url('examples'); ?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Live Examples - SUBMITTER HTML Forms">
    <meta name="twitter:description" content="Use SUBMITTER with real examples – submit forms, send emails, and handle files. Explore HTML demos to learn how it all works.">
    <meta name="twitter:image" content="https://submitter.aniketgolhar.in/assets/submitter-logo.png">
    <meta name="twitter:url" content="<?= base_url('examples'); ?>">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/logo.png');?>">

    <!-- STYLES -->

    <style {csp-style-nonce}>
      * {
        transition: background-color 300ms ease, color 300ms ease;
      }
      *:focus {
        background-color: rgba(221, 72, 20, .2);
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
          <li class="menu-item hidden active"><a href="<?= base_url('examples');?>">Examples</a></li>
          <li class="menu-item hidden"><a href="<?= base_url('contact');?>">Contact</a></li>
        </ul>
      </div>

      <div class="heroe">

        <h1 style="text-align: center;">
          <span style="color: black;">SUBMITTER</span> 
          <!-- <span style="color: red;">to</span>  -->
          <span style="color: purple;">EXAMPLE</span>
        </h1>

        <h4 style="text-align: center;">The interactive HTML editor on the left lets you modify form elements in real time. As you make changes, the form on the right updates instantly. Replace your@email.com with your own address and submit the form to see the submission arrive in your inbox.</h4>
      </div>

    </header>

    <!-- CONTENT -->

    <section>
      <p class="codepen" data-height="550" data-default-tab="html,result" data-slug-hash="wBaoKox" data-pen-title="SUBBMITTER Form" data-editable="true" data-user="gost-dost" style="height: 550px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/gost-dost/pen/wBaoKox">
  SUBBMITTER Form</a> by gost dost (<a href="https://codepen.io/gost-dost">@gost-dost</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://public.codepenassets.com/embed/index.js"></script>
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
