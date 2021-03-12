<?php
include 'functions_for_tests.php';

$result = getUsers();
$directoryNotFound = [];
if(isset($_POST['selected_username']) && !empty($_POST['selected_username'])) {
    if(isset($_POST['path']) && !empty($_POST['path'])){
        $directoryNotFound = createZipFile($_POST['path'], $_POST['selected_username']);
    } else if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
        $directoryNotFound = send_files($_FILES['fileToUpload'], $_POST['selected_username']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Secret WebSite
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #3b9e95 0%, #4dc0b5 100%);
        }
    </style>
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
      <!--Nav-->
      <nav id="header" class="fixed w-full z-30 top-0 text-white gradient">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <svg class="h-8 fill-current inline svg-icon pb-1" viewBox="0 0 20 20">
                        <path fill="white" d="M16.803,18.615h-4.535c-1,0-1.814-0.812-1.814-1.812v-4.535c0-1.002,0.814-1.814,1.814-1.814h4.535c1.001,0,1.813,0.812,1.813,1.814v4.535C18.616,17.803,17.804,18.615,16.803,18.615zM17.71,12.268c0-0.502-0.405-0.906-0.907-0.906h-4.535c-0.501,0-0.906,0.404-0.906,0.906v4.535c0,0.502,0.405,0.906,0.906,0.906h4.535c0.502,0,0.907-0.404,0.907-0.906V12.268z M16.803,9.546h-4.535c-1,0-1.814-0.812-1.814-1.814V3.198c0-1.002,0.814-1.814,1.814-1.814h4.535c1.001,0,1.813,0.812,1.813,1.814v4.534C18.616,8.734,17.804,9.546,16.803,9.546zM17.71,3.198c0-0.501-0.405-0.907-0.907-0.907h-4.535c-0.501,0-0.906,0.406-0.906,0.907v4.534c0,0.501,0.405,0.908,0.906,0.908h4.535c0.502,0,0.907-0.406,0.907-0.908V3.198z M7.733,18.615H3.198c-1.002,0-1.814-0.812-1.814-1.812v-4.535c0-1.002,0.812-1.814,1.814-1.814h4.535c1.002,0,1.814,0.812,1.814,1.814v4.535C9.547,17.803,8.735,18.615,7.733,18.615zM8.64,12.268c0-0.502-0.406-0.906-0.907-0.906H3.198c-0.501,0-0.907,0.404-0.907,0.906v4.535c0,0.502,0.406,0.906,0.907,0.906h4.535c0.501,0,0.907-0.404,0.907-0.906V12.268z M7.733,9.546H3.198c-1.002,0-1.814-0.812-1.814-1.814V3.198c0-1.002,0.812-1.814,1.814-1.814h4.535c1.002,0,1.814,0.812,1.814,1.814v4.534C9.547,8.734,8.735,9.546,7.733,9.546z M8.64,3.198c0-0.501-0.406-0.907-0.907-0.907H3.198c-0.501,0-0.907,0.406-0.907,0.907v4.534c0,0.501,0.406,0.908,0.907,0.908h4.535c0.501,0,0.907-0.406,0.907-0.908V3.198z"></path>
                    </svg>
                    SECRET
                </a>
            </div>
          <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
            </button>
          </div>
          <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
              <li class="mr-3">
                <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="/">Home</a>
              </li>
              <li class="mr-3">
                <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Get Tests</a>
              </li>
              <li class="mr-3">
                <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="./zabbix">Zabbix</a>
              </li>
              <li class="mr-3">
                <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="./zabbix">Get Logs</a>
              </li>
            </ul>
          </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
      </nav>
      <div class="pt-24 gradient">
          <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
              <!--Get Tests functionality-->
              <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                  <?php if($_GET['mode'] == "get") { ?>
                      <p class="uppercase tracking-loose w-full">Get the tests of your students</p>
                      <h1 class="my-4 text-5xl font-bold leading-tight">
                          Get the tests in a zip
                      </h1>
                      <p class="leading-normal text-2xl mb-8">
                          Please fill the form below to get the tests
                      </p>
                  <?php } elseif ($_GET['mode'] == "send") { ?>
                      <p class="uppercase tracking-loose w-full">Send files to our students</p>
                      <h1 class="my-4 text-5xl font-bold leading-tight">
                          Send files or a folder to our students
                      </h1>
                      <p class="leading-normal text-2xl mb-8">
                          Please fill the form below to get the tests
                      </p>
                  <?php } ?>
                  <form class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center" action="./get_tests.php?mode=<?php echo $_GET['mode']?>" method="post"
                  <?php if($_GET['mode'] == "send") echo 'enctype="multipart/form-data"'; ?>>
                      <div class="container px-3 mx-auto flex flex-wrap mb-3">
                          <select class="form-multiselect block w-72 mt-1" id="username" name="username[]" multiple="multiple">
                              <?php
                              foreach ($result as $user){
                                  echo '<option class="text-gray-800" value="'.$user["name"].'" >'.$user["name"].'</option>';
                              }
                              ?>
                          </select>
                          <button class="hover:underline bg-white text-gray-800 font-bold rounded-full m-4 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                  type="button" onclick="selectUser()">Confirm selection</button>
                          <select class="form-multiselect block w-72 mt-1" id="selected_username"name="selected_username[]" multiple="multiple">
                          </select>
                          <button class="hover:underline bg-white text-gray-800 font-bold rounded-full m-4 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                           type="button" onclick="unselectUser()">Remove selection</button>
                      </div>
                      <?php if($_GET['mode'] == "get") { ?>
                          <label class="px-3" for="fpath">Path to the test folder:</label><br>
                          <input class="text-gray-800 px-3 rounded-full block" type="text" id="path" name="path" placeholder="Folder/TE1" required>
                      <?php } elseif ($_GET['mode'] == "send") { ?>
                          <label class="px-3" for="fpath">Choose the file/folder to send:</label><br>
                          <input type="file" name="fileToUpload" id="fileToUpload">
                      <?php } ?>
                      <button onclick="selectAll();" class="block hover:underline gradient text-white font-bold rounded-full m-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                          <?php if($_GET['mode'] == "get") { echo "Search for the tests"; }
                                elseif ($_GET['mode'] == "send") { echo "Send files to students"; } ?></button>
                  </form>
              </div>
              <!--Right Col-->
              <div class="w-full md:w-3/5 py-6 text-center">
                  <?php
                    if(count($directoryNotFound) == 0) {
                        echo '<img class="w-full md:w-4/5 z-50" src="hero.png" />';
                    } else {
                        echo '<h1 class="leading-normal text-2xl mb-8">Be careful their were some problems when creating the zip</h1>';
                        foreach($directoryNotFound as $message){
                            echo '<p>'.$message.'</p>';
                        }
                    }
                  ?>
              </div>
          </div>
      </div>
      <section class="container mx-auto text-center">
          <div class="w-full mb-4">
              <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <a href="get_tests.php?mode=get" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              Get Tests
          </a>
          <a href="get_tests.php?mode=send" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              Send files
          </a>
      </section>
</body>
  <script>
      /**
       * Will select the users
       */
      function selectUser() {
          let username = document.getElementById("username");
          let selectedUsername = document.getElementById("selected_username");
          Array.from(username.selectedOptions).forEach(o => {
              username.remove(o.index);
              let option = document.createElement("option");
              option.className = "text-gray-800";
              option.text = o.value;
              option.value = o.value;
              selectedUsername.add(option);
          })
      }
      function unselectUser() {
          let username = document.getElementById("selected_username");
          let selectedUsername = document.getElementById("username");
          Array.from(username.selectedOptions).forEach(o => {
              username.remove(o.index);
              let option = document.createElement("option");
              option.className = "text-gray-800";
              option.text = o.value;
              option.value = o.value;
              selectedUsername.add(option);
          })
      }
      function selectAll()
      {
          let selectBox = document.getElementById("selected_username");
          for (let i = 0; i < selectBox.options.length; i++)
          {
              selectBox.options[i].selected = true;
          }
      }
  </script>
</html>

