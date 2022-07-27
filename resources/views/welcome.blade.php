<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Severstal test app</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link
        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
        rel="stylesheet"
      />

        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="grid grid-cols-3 gap-4  auto-rows-max">
        <header class="col-span-3 min-h-[150px] bg-gray-300">
              <!-- Header content -->
              <h3>The test task for severstal company. Product items.</h3>
            </header>

            <nav class=" bg-gray-100">
                navigation
            </nav>
            <main class="col-span-2 max-w mx-auto ">
              <!-- Main content -->
              <ul class="divide-y">
                @foreach ($products as $product)
                <li class="p-3 rounded-xl my-5 bg-gray-500">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-[50px] h-[50px] rounded-full" src="{{$product->file_path}}" alt="Neil image">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$product->title}}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{$product->price ?? 'null'}} {{$product->currency->name ?? 'null'}}
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <button class="button button-blue mr-3" data-ripple-light="true">Buy</button>
                        </div>
                    </div>
                </li>
                @endforeach
        </ul>
            </div>
            @include('pagination.default', ['paginator' => $products, 'link_limit' => 5])
          </main>



            <footer class="col-span-3  min-h-[100px]  flex justify-center bg-gray-300">
              <!-- Footer content -->
              &copy; 2022. Avtukhovich Andrei.
            </footer>
              </body>
</html>
