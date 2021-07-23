<?php
include 'functions_for_tests.php';

$result = getUsers();
$directoryNotFound = [];
if(isset($_POST['selected_username']) && !empty($_POST['selected_username'])) {
    if(isset($_POST['path'])){
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
                      <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="http://localhost:3000">See Logs</a>
                  </li>
                  <li class="mr-3">
                      <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="./block_sites.php">Block Sites</a>
                  </li>
                  <li class="mr-3">
                      <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="/zabbix">Zabbix</a>
                  </li>
              </ul>
          </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
      </nav>
      <div class="pt-24 gradient">
          <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
              <!--Get Tests functionality-->
              <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left ml-40">
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
                          Send sources to our students
                      </h1>
                      <p class="leading-normal text-2xl mb-8">
                          Please fill the form below to send a file or folder
                      </p>
                  <?php } ?>
                  <form class="container flex flex-wrap flex-col md:flex-row items-center" action="./files.php?mode=<?php echo $_GET['mode']?>" method="post"
                  <?php if($_GET['mode'] == "send") echo 'enctype="multipart/form-data"'; ?>>
                      <div class="container flex flex-wrap mb-3">
                          <div class="w-full flex flex-col mr-32 text-gray-800">
                              <div class="w-full">
                                  <div class="flex flex-col items-center relative">
                                      <div class="w-full  svelte-1l8159u">
                                          <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                                              <div id="selectedUserList" class="flex flex-auto flex-wrap">
                                              </div>
                                              <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                                                  <button type="button" onclick="dropdown()" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                      <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                                          <polyline id="polyline-id" points="18 15 12 9 6 15"></polyline>
                                                      </svg>
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                      <div id=dropdown style="display: none" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                                          <div class="flex flex-col w-full">
                                              <input type="text" placeholder="Search.." id="searchUser" onkeyup="filterFunction()">
                                              <?php
                                              foreach ($result as $user){
                                                  echo '<button id="button'.$user.'" onclick="return selectUser(\''.$user.'\')" class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                            <div class="w-full items-center flex">
                                                <p class="mx-2 leading-6">'.$user.'</p>
                                            </div>
                                        </div>
                                    </button>';
                                              }
                                              ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <select class="form-multiselect block w-72 mt-1" id="selected_username" name="selected_username[]" multiple="multiple" style="display: none">
                      </select>
                      <?php if($_GET['mode'] == "get") { ?>
                          <label class="px-3" for="fpath">Path to the folder in tests:</label><br>
                          <input class="text-gray-800 px-3 rounded-full block" type="text" id="path" name="path" placeholder="By default, /home/tests">
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
              <div class="flex flex-col w-full md:w-2/5 items-start text-center md:text-left">
                  <?php
                    if(count($directoryNotFound) == 0) {
                        echo '<img class="w-full md:w-4/5 z-50" src="images/hero.png" />';
                    } else if (count($directoryNotFound) == 1) {
                        echo '<h1 class="leading-normal text-2xl mb-8">Success, the action desired went well</h1>';
                        foreach($directoryNotFound as $message){
                            echo '<p>'.$message.'</p>';
                        }
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
      <style>
          .top-100 {top: 100%}
          .bottom-100 {bottom: 100%}
          .max-h-select {
              max-height: 300px;
          }
          #searchUser {
              box-sizing: border-box;
              background-image: url('images/search-icon.png');
              background-position: 14px 12px;
              background-repeat: no-repeat;
              font-size: 16px;
              padding: 14px 20px 12px 45px;
              border: none;
              border-bottom: 1px solid #ddd;
          }

          /* The search field when it gets focus/clicked on */
          #searchUser:focus {outline: 3px solid #ddd;}
      </style>
      <section class="container mx-auto text-center">
          <div class="w-full mb-4">
              <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex items-center justify-center">
              <a href="files.php?mode=get" class="mr-2 hover:underline bg-white text-gray-800 font-bold rounded-full py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Get Tests
              </a>
              <a href="files.php?mode=send" class="ml-2 hover:underline bg-white text-gray-800 font-bold rounded-full py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Send files
              </a>
          </div>

      </section>
</body>
  <script>
      function filterFunction() {
          let input, filter, i;
          input = document.getElementById("searchUser");
          filter = input.value.toUpperCase();
          let listuser = document.getElementById("dropdown");
          let names = listuser.getElementsByTagName('p');
          for (i = 0; i < names.length; i++) {
              let txtValue = names[i].textContent || names[i].innerText;
              let divparent = names[i].parentElement;
              let divparent2 = divparent.parentElement;
              let button = divparent2.parentElement;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  names[i].style.display = "";
                  divparent.style.display = "";
                  divparent2.style.display = "";
                  button.style.display = "";
              } else {
                  names[i].style.display = "none";
                  divparent.style.display = "none";
                  divparent2.style.display = "none";
                  button.style.display = "none";
              }
          }
      }

      /**
       * Will select the users
       */
      function selectUser(user) {
          let listuser = document.getElementById("selectedUserList");
          let div = document.createElement('div');
          div.id = user;
          div.className = 'flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300';
          let pName = document.createElement('p');
          pName.innerHTML = user;
          pName.className = 'text-xs font-normal leading-none max-w-full flex-initial';
          div.appendChild(pName)
          let divButton = document.createElement('div');
          divButton.className = 'flex flex-auto flex-row-reverse';
          let buttonCross = document.createElement('button');
          buttonCross.addEventListener("click", function () {
              unselectUser(user)
          });
          let svg = generateCross();
          buttonCross.appendChild(svg);
          divButton.appendChild(buttonCross);
          div.appendChild(divButton);
          listuser.appendChild(div);
          return false;
      }

      function generateCross() {
          svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
          svg.setAttribute('width', '100%');
          svg.setAttribute('height', '100%');
          svg.setAttribute('fill', 'none');
          svg.setAttribute('viewBox', '0 0 24 24');
          svg.setAttribute('stroke', 'currentColor');
          svg.setAttribute('stroke-width', '2');
          svg.setAttribute('stroke-linecap', 'round');
          svg.setAttribute('stroke-linejoin', 'round');
          svg.setAttribute('class', 'feather feather-x cursor-pointer hover:text-teal-400 rounded-full w-4 h-4 ml-2');
          let line1 = document.createElementNS('http://www.w3.org/2000/svg','line');
          line1.setAttribute('x1','18');
          line1.setAttribute('y1','6');
          line1.setAttribute('x2','6');
          line1.setAttribute('y2','18');
          let line2 = document.createElementNS('http://www.w3.org/2000/svg','line');
          line2.setAttribute('x1','6');
          line2.setAttribute('y1','6');
          line2.setAttribute('x2','18');
          line2.setAttribute('y2','18');
          svg.appendChild(line1);
          svg.appendChild(line2);
          return svg;
      }

      function unselectUser(user) {
          let div = document.getElementById(user);
          div.innerHTML = "";
          div.remove();
      }

      function dropdown()
      {
          let dropdown = document.getElementById("dropdown");
          let polyline = document.getElementById('polyline-id');
          if (dropdown.style.display === "none") {
              dropdown.style.display = "block";
              polyline.setAttribute("points", '15 6 9 12 15 18');
          } else {
              dropdown.style.display = "none";
              polyline.setAttribute("points", '18 15 12 9 6 15');
          }


      }

      function selectAll()
      {
          let listuser = document.getElementById("selectedUserList");
          let selectedUsername = document.getElementById("selected_username");
          let names = listuser.getElementsByTagName('p');
          for (let i = 0; i < names.length; i++)
          {
              let option = document.createElement("option");
              option.className = "text-gray-800";
              option.text = names[i].innerHTML;
              option.value = names[i].innerHTML;
              selectedUsername.add(option);
          }
          for (let i = 0; i < selectedUsername.options.length; i++)
          {
              selectedUsername.options[i].selected = true;
          }
      }
  </script>
</html>

