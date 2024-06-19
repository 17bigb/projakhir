<script setup>
import {Head} from "@inertiajs/vue3"
import App from "@/Layouts/App.vue";
</script>

<template>
    <App>
        <Head title="About"></Head>
        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="https://media.licdn.com/dms/image/D5603AQE8XcO_9n3U7A/profile-displayphoto-shrink_800_800/0/1678091188177?e=1724284800&v=beta&t=V1_29unngPj_vI9r6JvLx_sR6Rfa0qJCnvTWOCbBVic" alt="Erwin">
                                <div>
                                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Erwin Marbinoto Tamba</a>
                                    <p class="text-base text-gray-500 dark:text-gray-400">Undergraduate Information Technology Student at Brawijaya University</p>
                                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2024-06-14" title="July 14th, 2024">July. 14, 2024</time></p>
                                </div>
                            </div>
                        </address>
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Best practices for successful prototypes</h1>
                    </header>
                    <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id molestias labore ipsam dolorem esse tempore, aliquid rem, ipsum, delectus vitae error voluptatum obcaecati veniam commodi laudantium earum numquam reiciendis ut.</p>
                    <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
                        you can think things through before committing to an actual design project.</p>
                    
                    <figure><img src="https://c1.staticflickr.com/1/583/31666916393_78c9048b14_c.jpg" alt="">
                    </figure>
                </article>
            </div>
            <br>
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="https://media.licdn.com/dms/image/D5603AQEJnLwSyGeCYw/profile-displayphoto-shrink_400_400/0/1718707848068?e=1724284800&v=beta&t=dO8sRZET5GWCRw14s46AqZwxVIToRcxyK7LdGZdwKqA" alt="Ardhi Wahyu">
                                <div>
                                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Ardhi Wahyu</a>
                                    <p class="text-base text-gray-500 dark:text-gray-400">Undergraduate Information Technology Student at Brawijaya University</p>
                                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2024-06-15" title="July 15th, 2024">July. 15, 2024</time></p>
                                </div>
                            </div>
                        </address>
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Best practices for successful prototypes</h1>
                    </header>
                    <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id molestias labore ipsam dolorem esse tempore, aliquid rem, ipsum, delectus vitae error voluptatum obcaecati veniam commodi laudantium earum numquam reiciendis ut.</p>
                    <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
                        you can think things through before committing to an actual design project.</p>
                    
                    <figure><img src="https://cdn.antaranews.com/cache/1200x800/2023/12/14/IMG_1674.jpg" alt="ardhi">
                    </figure>
                </article>
            </div>

        </main>
    </App>
</template>
