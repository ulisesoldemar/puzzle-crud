<template>
  <Head :title="puzzle.name" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ puzzle.name.replace(/^\w/, c => c.toUpperCase()) }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-4">
              <Link
                class="
                  inline-block
                  px-6
                  py-2.5
                  bg-blue-600
                  text-white
                  font-medium
                  text-xs
                  leading-tight
                  uppercase
                  rounded
                  shadow-md
                  hover:bg-blue-700 hover:shadow-lg
                  focus:bg-blue-700
                  focus:shadow-lg
                  focus:outline-none
                  focus:ring-0
                  active:bg-blue-800 active:shadow-lg
                  transition
                  duration-150
                  ease-in-out
                "
                :href="route('puzzles.index')"
              >
                Back
              </Link>
            </div>
            <!-- Container for demo purpose -->
            <div class="container my-6 px-6 mx-auto">
              <!-- Section: Design Block -->
              <section class="mb-32 text-gray-800 text-center md:text-left">
                <div
                  class="
                    grid
                    md:grid-cols-2
                    gap-x-6
                    xl:gap-x-12
                    items-center
                    mb-12
                  "
                >
                  <div class="mb-6 md:mb-0">
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
                      "
                      data-mdb-ripple="true"
                      data-mdb-ripple-color="light"
                    >
                      <img
                        :src="showImage() + puzzle.image"
                        class="w-full"
                        alt="..."
                      />
                      <a href="#">
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

                  <div class="mb-6 md:mb-0">
                    <h3 class="text-2xl font-bold mb-3">
                      {{ puzzle.name.replace(/^\w/, c => c.toUpperCase()) }}
                    </h3>
                    <div
                      class="
                        mb-3
                        text-red-600
                        font-medium
                        text-sm
                        flex
                        items-center
                        justify-center
                        md:justify-start
                      "
                    >
                      {{ puzzle.type.replace(/^\w/, c => c.toUpperCase()) }}
                    </div>
                    <p class="text-gray-500 mb-6">
                      <small
                        >Created at <u>{{ new Date(puzzle.created_at) }}</u>
                      </small>
                      <br />
                      <small
                        >Updated at <u>{{ new Date(puzzle.updated_at) }}</u>
                      </small>
                    </p>
                    <p class="text-gray-500">{{ puzzle.description }}</p>
                    <div class="space-x-2 justify-center mt-6">
                      <div>
                        <Link
                          :href="route('puzzles.edit', puzzle.id)"
                          type="button"
                          class="
                            inline-block
                            px-6
                            py-2.5
                            bg-yellow-500
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-yellow-600 hover:shadow-lg
                            focus:bg-yellow-600
                            focus:shadow-lg
                            focus:outline-none
                            focus:ring-0
                            active:bg-yellow-700 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out
                          "
                        >
                          Update
                        </Link>
                        <Link
                          method="delete"
                          :href="route('puzzles.destroy', puzzle.id)"
                          as="button"
                          class="
                            inline-block
                            px-6
                            py-2.5
                            bg-red-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-red-700 hover:shadow-lg
                            focus:bg-red-700
                            focus:shadow-lg
                            focus:outline-none
                            focus:ring-0
                            active:bg-red-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out
                          "
                        >
                          Delete
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="
                    grid
                    md:grid-cols-2
                    gap-x-6
                    xl:gap-x-12
                    items-center
                    mb-12
                  "
                ></div>
              </section>
              <!-- Section: Design Block -->
            </div>
            <!-- Container for demo purpose -->
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeNavLink,
    Link,
  },

  methods: {
    showImage() {
      return "/storage/";
    },
  },

  props: {
    puzzle: Object,
  },
};
</script>