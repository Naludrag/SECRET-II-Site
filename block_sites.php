<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
                    <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="./files.php">Get Tests</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="./zabbix">Zabbix</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="http://localhost:3000">Get Logs</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Block Sites</a>
                </li>
            </ul>
        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
<div class="pt-24 gradient">
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">Create new configuration file</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Creation of new files
            </h1>
            <p class="leading-normal text-2xl mb-2">
                Add sites that you want to block
            </p>
            <form class="flex-1" onsubmit="return addItem('list', this.inputItem)">
                <input class="text-gray-800 px-3 rounded-full inline" type="text" id="inputItem" placeholder="Enter a domain name">
                <input class="inline hover:underline gradient text-white font-bold rounded-full m-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                       type="submit" value="Add website to list">
            </form>
            <p class="leading-normal text-2xl">
                List of Websites
            </p>
            <h3 id="NoWebsites" class="text-center md:text-center mt-1">No websites for the moment...</h3>
            <ul class="px-3 bg-green-400 bg-opacity-10 mt-1" id="list" style="columns: 200px 3;">

            </ul>
            <form onsubmit="download()" class="mt-10">
                <label for="nameFile">Please enter the name of the file : </label>
                <input class="text-gray-800 px-3 rounded-full inline" type="text" id="inputFileName" placeholder="Name of the file">
                <input class="my-6 hover:underline gradient text-white font-bold rounded-full py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                       type="submit" value="Download config file">
            </form>
        </div>
        <!--Right Col-->
        <div class="flex flex-col w-full md:w-2/5 items-start text-center md:text-left ml-48">
            <p class="uppercase tracking-loose w-full">Use profile</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Start a capture
            </h1>
            <p class="leading-normal text-2xl mb-8">
                Explanation on how to start a capture
            </p>
            <p class="leading-normal mb-8">
                To start a capture please open a terminal and run the command : <br>
                python3 /etc/mitmproxy_configfile_start.py
            </p>
        </div>
    </div>
</div>
</body>
<script>
    /**
     * Add site to list
     */
    function addItem(liste, inputField) {
        // If now site is entered do not add it
        if(inputField.value === ""){
            return
        }
        // Get the list of websites
        var list = document.getElementById(liste);
        // Create a li to add the website to the list
        var listItem = document.createElement("li");
        // Get the value of the user input
        listItem.innerText = inputField.value;
        listItem.className = "hover:bg-green-400 bg-opacity-10";
        // Add the website to the list
        list.appendChild(listItem);
        // If a website is added disable the message
        if(document.getElementById("list").getElementsByTagName('li').length === 1){
            var message = document.getElementById("NoWebsites");
            message.style.display = "none";
        }
        // To not reload the page
        return false;
    }

    /**
     * To create a configuration file and make it download
     */
    function download() {
        // Get the name chosen by the user
        var name = document.getElementById("inputFileName").value + ".config";
        var arr = [];
        // Get the list of websites
        var sites = document.getElementById("list").getElementsByTagName('li');
        // If now websites are given. Alert the user
        if(sites.length === 0){
            window.alert("Please enter at least one website");
            return
        }
        // Add the websites to the array
        for(let i = 0;i < sites.length; i++)
        {
            arr.push(sites[i].innerHTML+"\n");
        }
        // Download the file
        var file = new Blob(arr, {type: 'text/plain'});
        if (window.navigator.msSaveOrOpenBlob)
            window.navigator.msSaveOrOpenBlob(file, name);
        else {
            var a = document.createElement("a"),
                url = URL.createObjectURL(file);
            a.href = url;
            a.download = name;
            document.body.appendChild(a);
            a.click();
            setTimeout(function() {
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            }, 0);
        }
    }
</script>
</html>

