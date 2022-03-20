<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <!-- Container for demo purpose -->
          <div class="container my-6 px-6 mx-auto">
            <!-- Section: Design Block -->
            <section class="mb-32 text-gray-800 text-center md:text-left">
              <h2 class="text-3xl font-bold mb-12 text-center">
                Latest puzzles added
              </h2>

              <div
                v-for="puzzle in puzzles"
                :key="puzzle.id"
                class="flex flex-wrap mb-6"
              >
                <div
                  class="
                    grow-0
                    shrink-0
                    basis-auto
                    w-full
                    md:w-3/12
                    px-3
                    mb-6
                    md:mb-0
                    ml-auto
                  "
                >
                  <div
                    class="
                      relative
                      overflow-hidden
                      bg-no-repeat bg-cover
                      relative
                      overflow-hidden
                      bg-no-repeat bg-cover
                      ripple
                      shadow-lg
                      rounded-lg
                      mb-6
                    "
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                  >
                    <img
                      :src="showImage() + puzzle.image"
                      class="w-min"
                      alt="Louvre"
                    />
                    <a :href="route('puzzles.show', puzzle.id)">
                      <div
                        class="
                          absolute
                          top-0
                          right-0
                          bottom-0
                          left-0
                          w-full
                          h-full
                          overflow-hidden
                          bg-fixed
                          opacity-0
                          hover:opacity-100
                          transition
                          duration-300
                          ease-in-out
                        "
                        style="background-color: rgba(251, 251, 251, 0.2)"
                      ></div>
                    </a>
                  </div>
                </div>
                <div
                  class="
                    grow-0
                    shrink-0
                    basis-auto
                    w-full
                    md:w-9/12
                    xl:w-7/12
                    px-3
                    mb-6
                    md:mb-0
                    mr-auto
                  "
                >
                  <h5 class="text-lg font-bold mb-3">{{ puzzle.name }}</h5>
                  <p class="text-gray-500 mb-6">
                    <small>Updated at <u>{{ new Date(puzzle.updated_at) }}</u></small>
                  </p>
                </div>
              </div>
            </section>
            <!-- Section: Design Block -->
          </div>
          <!-- Container for demo purpose -->
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
export default {
  methods: {
    showImage() {
      return "/storage/";
    },
  },

  props: {
    puzzles: Array,
    count: Number,
  },
};
</script>
