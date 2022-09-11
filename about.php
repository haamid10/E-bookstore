<?php

include 'config.php';
include 'header.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>


</head>
<body>


<section class="about">

<div class="flex">

   

  

   <main class=" ">
     <div class="sm:text-center lg:text-left">
       <h1 class="text-2xl text-left font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
         <span class="block xl:inline capitalize">Visit us </span>
         <span class="block text-indigo-600 xl:inline">to Grow your mind</span>
       </h1>
       <p class="mt-3 text-center  text-gray-500  mr-32">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
       
     </div>
     
   </main>
   <div class="image">
      <img class="rounded-tr-l  rounded-t-2xl" src="./uploaded_img/l1.jpg" alt="">
   </div>
</div>

<!-- one  -->


<div class="flex">

 <div class="image mt-16">
      <img class="rounded-tr-l  rounded-t-2xl" src="./uploaded_img/l3.jpg" alt="">
   </div>
   <main class=" mt-10 max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
     <div class="sm:text-center lg:text-left">
       <h1 class="text-2xl text-right font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
         <span class="block xl:inline capitalize">Read and visit us to Grow</span>
         <span class="block text-indigo-600 xl:inline">your mind</span>
       </h1>
       <p class="mt-3 text-center  text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-44">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
       
     </div>
     
   </main>
 
</div>

</section> 


<section>


 <div class="bg-white py-12">
  <div class="mx-32 mt-12 mb  lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-6xl font-semibold text-indigo-600">Reading</h2>
      <p class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl">Is a better way to invest your time</p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">when we are  telling you reading is better way to invest your time, Means you will get time talk with your mind, you will listen your opinions .</p>
    </div>

    <div class="mt-10">
      <dl class="space-y-10 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10 md:space-y-0">
        <div class="relative">
          <dt>
            <div class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/globe-alt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
              </svg>
            </div>
            <p class="ml-16 text-xl font-medium leading-6 text-gray-900">Reduces Stress</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">The study found that 30 minutes of reading lowered blood pressure, heart rate, and feelings of psychological distress just as effectively as yoga and humor did..</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
              </svg>
            </div>
            <p class="ml-16 text-xl font-medium leading-6 text-gray-900">Reading strengthens your brain</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Brain scans showed that throughout the reading period and for days afterward, brain connectivity increased, especially in the somatosensory cortex, the part of the brain that responds to physical sensations like movement and pain.

   </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/bolt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
              </svg>
            </div>
            <p class="ml-16 text-xl font-medium leading-6 text-gray-900">Keeping your brain in shape</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Mental fitness means keeping your brain and emotional health in tip-top shape. It doesn’t mean training for “brain Olympics” or acing an IQ test. It refers to a series of exercises that help you.</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/chat-bubble-bottom-center-text -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
              </svg>
            </div>
            <p class="ml-16 text-xl font-medium leading-6 text-gray-900">Increases your ability to empathize</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Researchers call this ability the “theory of mind,” a set of skills essential for building, navigating, and maintaining social relationships..</dd>
        </div>
      </dl>
    </div>
  </div>
</div>
</section>






<section class="about">

   <div class="flex">

      <div class="image">
         <img class="rounded-tr-l  rounded-t-2xl" src="./uploaded_img/books.jpg" alt="">
      </div>

     

      <main class=" mt-10 max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-2xl text-right font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline capitalize">Read and visit us to Grow</span>
            <span class="block text-indigo-600 xl:inline">your mind</span>
          </h1>
          <p class="mt-3 text-center  text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-44">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
          
        </div>
      </main>
   </div>

</section>

<!-- This example requires Tailwind CSS v2.0+ -->








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>