@extends('layouts.plantilla')
@section('title','welcome')
@section('content')
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet">
<div class="bg-blue-100 container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class=" flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-red-500 text-lg">
                            REGISTRO
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                            Para poder registrarse deben llenar todos los campos <span class="text-red-500">(todos los campos que son obligatorios)</span> todos los empleados pertenecen a una gerencia, pero algunos no a un departamento en ese caso es  <span class="text-green-500">ninguno</span>
                        </p>

                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                        <span class="hidden">Like</span>
                        <i class="fa fa-heart"></i>
                    </a>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-red-500 text-lg">
                         COSAS
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                            Todos los empleados de COTEL.R.L deben completar su registro, con su número de celular, correo electronico y su contraseña
                        </p>


                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                            como es
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                            asas
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                            4
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                        4
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                        4
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                            2
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                        4
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <!-- Article -->
            <article class="bg-orange-100 overflow-hidden rounded-lg shadow-lg">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            Article Title
                        </a>
                    </h1>
                </header>
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                    <img class="float-left mr-4 my-2 h-32" src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80">
                        <p class="ml-2 text-md">
                        4
                        </p>
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

    </div>
</div>


@endsection



