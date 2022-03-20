<template>
  <Head title="Create puzzle" />
  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Puzzle Create
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <form @submit.prevent="submit" class="mb-6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div
              class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
            >
              <div class="grid grid-cols-1">
                <label
                  class="
                    uppercase
                    md:text-sm
                    text-xs text-gray-500 text-light
                    font-semibold
                  "
                  >Name</label
                >
                <input
                  id="name"
                  v-model="form.name"
                  class="
                    py-2
                    px-3
                    rounded-lg
                    border-2 border-purple-300
                    mt-1
                    focus:outline-none
                    focus:ring-2
                    focus:ring-purple-600
                    focus:border-transparent
                  "
                  type="text"
                  placeholder="Name"
                />
                <div v-if="errors.name" class="mt-3 list-disc list-inside text-sm text-red-600">
                  {{ errors.name }}
                </div>
              </div>
              <div class="grid grid-cols-1">
                <label
                  class="
                    uppercase
                    md:text-sm
                    text-xs text-gray-500 text-light
                    font-semibold
                  "
                  >Type</label
                >
                <select
                  id="type"
                  v-model="form.type"
                  class="
                    form-select
                    appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700
                    focus:bg-white
                    focus:border-blue-600
                    focus:outline-none
                  "
                  aria-label="Default select example"
                >
                  <option value="2x2">2x2</option>
                  <option value="3x3">3x3</option>
                  <option value="4x4">4x4</option>
                  <option value="nxn">NxN</option>
                  <option value="special">Special Shapes</option>
                  <option value="other">Other</option>
                </select>
                <div v-if="errors.type" class="mt-3 list-disc list-inside text-sm text-red-600">
                  {{ errors.type }}
                </div>
              </div>
              <div class="grid grid-cols-1">
                <label
                  class="
                    uppercase
                    md:text-sm
                    text-xs text-gray-500 text-light
                    font-semibold
                  "
                  >Description</label
                >
                <textarea
                  id="description"
                  v-model="form.description"
                  class="
                    py-2
                    px-3
                    rounded-lg
                    border-2 border-purple-300
                    mt-1
                    focus:outline-none
                    focus:ring-2
                    focus:ring-purple-600
                    focus:border-transparent
                  "
                  type="text"
                  placeholder="Description"
                />
                <div v-if="errors.description" class="mt-3 list-disc list-inside text-sm text-red-600">
                  {{ errors.description }}
                </div>
              </div>
              <div class="grid grid-cols-1">
                <label
                  for="File"
                  class="
                    uppercase
                    md:text-sm
                    text-xs text-gray-500 text-light
                    font-semibold
                  "
                  >Image</label
                >
                <input
                  type="file"
                  @change="previewImage"
                  ref="photo"
                  class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700
                    focus:bg-white
                    focus:border-blue-600
                    focus:outline-none
                  "
                />
                <img
                  v-if="url"
                  :src="url"
                  class="p-1 bg-white border rounded max-w-sm h-auto"
                />
                <div v-if="errors.image" class="mt-3 list-disc list-inside text-sm text-red-600">
                  {{ errors.image }}
                </div>
              </div>
            </div>

            <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
              <Link
                :href="route('puzzles.index')"
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
                type="button"
              >
                Cancel
              </Link>
              <button
                class="
                  inline-block
                  px-6
                  py-2.5
                  bg-green-500
                  text-white
                  font-medium
                  text-xs
                  leading-tight
                  uppercase
                  rounded
                  shadow-md
                  hover:bg-green-600 hover:shadow-lg
                  focus:bg-green-600
                  focus:shadow-lg
                  focus:outline-none
                  focus:ring-0
                  active:bg-green-700 active:shadow-lg
                  transition
                  duration-150
                  ease-in-out
                "
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      url: null,
    };
  },
  setup() {
    const form = useForm({
      name: null,
      type: null,
      description: null,
      image: null,
    });

    return { form };
  },
  methods: {
    submit() {
      if (this.$refs.photo) {
        this.form.image = this.$refs.photo.files[0];
      }
      Inertia.post(route("puzzles.store"), this.form);
    },
    previewImage(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>