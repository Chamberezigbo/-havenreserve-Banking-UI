<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<meta
    http-equiv="content-type"
    content="text/html;charset=utf-8"
  />
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home ›  Havenreserve Bank</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta
      name="apple-mobile-web-app-title"
      content="  Havenreserve Bank"
    />
    <script
      async=""
      src="https://www.googletagmanager.com/gtag/js?id=UA-63016301-1"
    ></script>
    <script>
      function gtag() {
        dataLayer.push(arguments);
      }
      (window.dataLayer = window.dataLayer || []),
        gtag("js", new Date()),
        gtag("config", "UA-63016301-1");
    </script>
    <link rel="stylesheet" href="assets/css/main.min7a41.css?v=1712078711294" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
      WebFont.load({
        google: {
          families: [
            "Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i",
          ],
        },
      });
    </script>
    <script
      type="text/javascript"
      src="http://cdn.rlets.com/capture_configs/950/c58/b93/967466697e29ce2dcd0be64.js"
      async="async"
    ></script>
  </head>
  <body class="home">
    <div role="navigation" aria-label="Skip content and Acrobat Reader">
      <div class="hidden-compliance" id="complianceMenu">
        <ul class="list-unstyled">
          <li><a href="index.html">Home</a></li>
          <li><a href="#main">Skip to main content</a></li>
          <li><a href="#footer">Skip to footer</a></li>
        </ul>
      </div>
      <a
        class="hidden-compliance external"
        href="http://get.adobe.com/reader/"
        title="External link to download Acrobat Reader"
        aria-label="Acrobat Reader download"
        >Download Acrobat Reader 5.0 or higher to view .pdf files.</a
      >
    </div>
    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 1): ?>
      <script>
          // Show error message in JavaScript alert
          alert("<?php echo $_SESSION['errorMassage'];?>");

          // Close the alert after a minute
          setTimeout(function() {
              // Close the alert
              closeAlert();
          }, 60000); // 60000 milliseconds = 1 minute

          function closeAlert() {
              // Close the alert dialog
              window.close();
          }
      </script>
    <?php endif; unset($_SESSION['error']); ?>



    <div class="master-container">

      <header class="header">
        <div class="container">
          <div
            class="header__inner d-md-flex flex-md-row justify-content-md-between align-items-md-center align-content-md-center"
          >
            <div class="header__left">
              <span itemscope="" itemtype="http://schema.org/BankOrCreditUnion"
                ><span itemprop="name" class="sr-only"
                  >  Havenreserve Bank</span
                >
                <a
                  href="index.php"
                  class="logo"
                  title="  Havenreserve Bank, Independence, MO"
                  itemprop="url"
                  ><span
                    class="logotype"
                    itemprop="image"
                    itemscope=""
                    itemtype="http://schema.org/ImageObject"
                    ><img
                      src="assets/img/blue-ridge-bank-and-trust-co.svg"
                      alt="  Havenreserve Bank"
                      itemprop="url" /></span></a
              ></span>
            </div>
            <div
              class="header__right d-flex justify-content-center align-items-center"
            >
              <nav class="navbar" aria-label="Primary">
                <div class="navbar-header">
                  <button
                    type="button"
                    class="navbar-toggle collapsed btn btn-primary"
                    data-toggle="collapse"
                    data-target="#navbar-collapse"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <span class="sr-only">Toggle </span>Menu
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                  <div
                    class="d-flex d-lg-none justify-content-between align-items-center p-2"
                  >
                    <div class="menu-title-text">Menu</div>
                    <button
                      type="button"
                      class="navbar-toggle collapsed"
                      data-toggle="collapse"
                      data-target="#navbar-collapse"
                      aria-expanded="false"
                      aria-haspopup="true"
                    >
                      Close<span class="sr-only"> Menu</span
                      ><span class="icon icon-close" aria-hidden="true"></span>
                    </button>
                  </div>
                  <ul
                    class="banno-menu menu-121a2bd3-a11d-11ea-9d90-0242da0b0362"
                  >
                    <li class="dropdown menu-category">
                      <span
                        role="button"
                        aria-expanded="false"
                        class="category-item"
                        tabindex="0"
                        >Personal</span
                      >
                      <ul class="dropdown-menu">
                        <li class="dropdown menu-group">
                          <span
                            role="button"
                            aria-expanded="false"
                            class="group-item"
                            tabindex="0"
                            >Apply Online</span
                          >
                          <ul class="dropdown-menu">
                            <li class="menu-internal">
                              <a
                                href="personal/checking.html"
                                >Deposit Accounts Application</a
                              >
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown menu-category">
                      <span
                        role="button"
                        aria-expanded="false"
                        class="category-item"
                        tabindex="0"
                        >Business</span
                      >
                      <ul class="dropdown-menu">
                        <li class="dropdown menu-group">
                          <span
                            role="button"
                            aria-expanded="false"
                            class="group-item"
                            tabindex="0"
                            >Business Products and Services</span
                          >
                          <ul class="dropdown-menu">
                            <li class="menu-internal">
                              <a href="business/checking.html">Checking</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown menu-category">
                      <span
                        role="button"
                        aria-expanded="false"
                        class="category-item"
                        tabindex="0"
                        >Online</span
                      >
                      <ul class="dropdown-menu">
                        <li class="dropdown menu-group">
                          <span
                            role="button"
                            aria-expanded="false"
                            class="group-item"
                            tabindex="0"
                            >Online Services</span
                          >
                          <ul class="dropdown-menu">
                            <li class="menu-internal">
                              <a href="../personal/checking.html"
                                >Personal</a
                              >
                            </li>
                            <li class="menu-internal">
                              <a href="../business/checking.html"
                                >Business</a
                              >
                            </li>
                          </ul>
                        </li>
                        <li class="dropdown menu-group">
                          <span
                            role="button"
                            aria-expanded="false"
                            class="group-item"
                            tabindex="0"
                            >Online Security</span
                          >
                          <ul class="dropdown-menu">
                            <li class="menu-internal">
                              <a href="security.html">Security Statement</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown menu-category">
                      <span
                        role="button"
                        aria-expanded="false"
                        class="category-item"
                        tabindex="0"
                        >About Us</span
                      >
                      <ul class="dropdown-menu">
                        <li class="dropdown menu-group">
                          <span
                            role="button"
                            aria-expanded="false"
                            class="group-item"
                            tabindex="0"
                            >Who We Are</span
                          >
                          <ul class="dropdown-menu">
                            <li class="menu-internal">
                              <a href="about-us/contact-us.php">Contact Us</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <div class="d-block d-lg-none mb-2">
                    <nav class="topnav__links" aria-label="Top navigation">
                      <ul
                        class="banno-menu menu-121a2bd0-a11d-11ea-9d90-0242da0b0362"
                      >
                        <li class="menu-external">
                          <a
                            href=""
                            target="_blank"
                            >Trust Login</a
                          >
                        </li>
                        <li class="menu-external">
                          <a
                            href=""
                            target="_blank"
                            >Make a Payment</a
                          >
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <button
                    type="button"
                    class="header__button toggle-search d-none d-lg-inline-block"
                  >
                    <span class="icon icon-search" aria-hidden="true" id="google_translate_element"></span
                    >
                  </button>
                </div>
              </nav>
              <div class="olb">
                <div class="olb__toggle btn btn-success">
                  <span class="login-text"
                    >Login<span class="sr-only"> to online banking</span></span
                  >
                  <span class="close-text"
                    >Close<span class="sr-only"> online banking</span></span
                  >
                </div>
                <div
                  class="olb__container"
                  role="region"
                  aria-labelledby="region--olb-title"
                >
                  <div class="d-block d-md-none p-2 text-right">
                    <button class="olb__toggle">
                      <span class="close-text">Close</span
                      ><span class="sr-only"> online banking</span>
                      <span
                        class="icon icon-close ml-2"
                        aria-hidden="true"
                      ></span>
                    </button>
                  </div>
                  <form
                    class="olb__login parsley-absolute"
                    id="loginForm"
                    method="post"
                    action="login.inc.php"
                    data-parsley-validate=""
                  >
                    <div class="form-label" id="region--olb-title">
                      Log into Your Account
                    </div>
                    <div class="form-group mb-0">
                      <label for="id">Username</label>
                      <input
                        type="text"
                        name="username"
                        id="id"
                        class="form-control"
                        autocomplete="off"
                        required=""
                      />
                      <input type="hidden" name="login" value="true">
                    </div>
                    <div class="form-group mb-0">
                    <label for="pass">Password</label>
                    <input
                      type="password"
                      name="password"
                      id="pass"
                      class="form-control"
                      autocomplete="off"
                      required=""
                    />
                    </div>
                    <input
                      type="submit"
                      class="btn btn-small btn-success"
                      value="Login"
                    />
                  </form>
                  <div
                    class="olb__links d-md-flex justify-content-md-center text-center"
                  >
                    <div>
                      <a href=""
                        >Forgot Password</a
                      >
                    </div>
                    <!-- <div>
                      <a href="">Enroll</a>
                    </div> -->
                    <div>
                      <a
                        href="#"
                        >Trust Login</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>