<template>
  <Head title="Puzzles" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Puzzle Index
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-4">
              <Link
                class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded"
                :href="route('puzzles.create')"
              >
                Create
              </Link>
            </div>
            <div class="flex flex-col">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table class="min-w-full">
                      <thead class="bg-white border-b">
                        <tr>
                          <th
                            scope="col"
                            class="
                              text-sm
                              font-medium
                              text-gray-900
                              px-6
                              py-4
                              text-left
                            "
                          >
                            ID
                          </th>
                          <th
                            scope="col"
                            class="
                              text-sm
                              font-medium
                              text-gray-900
                              px-6
                              py-4
                              text-left
                            "
                          >
                            Image
                          </th>
                          <th
                            scope="col"
                            class="
                              text-sm
                              font-medium
                              text-gray-900
                              px-6
                              py-4
                              text-left
                            "
                          >
                            Name
                          </th>
                          <th
                            scope="col"
                            class="
                              text-sm
                              font-medium
                              text-gray-900
                              px-6
                              py-4
                              text-left
                            "
                          >
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="puzzle in puzzles"
                          :key="puzzle.id"
                          class="
                            bg-white
                            border-b
                            transition
                            duration-300
                            ease-in-out
                            hover:bg-gray-100
                          "
                        >
                          <td
                            class="
                              px-6
                              py-4
                              whitespace-nowrap
                              text-sm
                              font-medium
                              text-gray-900
                            "
                          >
                            <Link
                              class="display:block"
                              :href="route('puzzles.show', puzzle.id)"
                              >{{ puzzle.id }}
                            </Link>
                          </td>
                          <td
                            class="
                              text-sm text-gray-900
                              font-light
                              px-6
                              py-4
                              whitespace-nowrap
                            "
                          >
                            <Link
                              class="display:block"
                              :href="route('puzzles.show', puzzle.id)"
                            >
                              <div class="flex flex-wrap justify-center">
                                <img
                                  :src="showImage() + puzzle.image"
                                  class="p-1 bg-white border rounded w-40 h-40"
                                  alt="..."
                                />
                              </div>
                            </Link>
                          </td>
                          <td
                            class="
                              text-sm text-gray-900
                              font-light
                              px-6
                              py-4
                              whitespace-nowrap
                            "
                          >
                            <Link
                              class="display:block"
                              :href="route('puzzles.show', puzzle.id)"
                            >
                              {{ puzzle.name }}
                            </Link>
                          </td>
                          <td
                            class="
                              text-sm text-gray-900
                              font-light
                              px-6
                              py-4
                              whitespace-nowrap
                            "
                          >
                            <div class="flex space-x-2">
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
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
    puzzles: Object,
  },
};
</script>