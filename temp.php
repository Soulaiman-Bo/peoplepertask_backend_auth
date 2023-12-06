<div>
      <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
          <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl dark:bg-gray-900">
            <div class="flex items-center justify-between px-4">
              <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                Filters
              </h2>
              <button type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400 dark:bg-gray-900">
                <span class="sr-only dark:text-white">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <!-- Filters -->
            <form class="mt-4 border-t border-gray-200">
              <h3 class="sr-only">Categories</h3>

              <ul role="list" class="px-2 py-3 font-medium text-gray-900">

              <?php foreach($results as $row): ?>
                <li>
                  <a href="#" class="block px-2 py-3 dark:text-white"><?= $row['category_name'] ?></a>
                </li>
              <?php endforeach; ?>
                
              </ul>

              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-0" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Payment Terms</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-0">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-color-0" name="color[]" value="all" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">All</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-2" name="color[]" value="hourly" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Hourly</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-3" name="color[]" value="fixed-price" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Fixed Price</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-0" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Level</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-0">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-color-0" name="color[]" value="all" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">Expert</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-2" name="color[]" value="hourly" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Intermediate</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-3" name="color[]" value="fixed-price" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Beginner</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-1" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Quotes Received</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-1">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-category-0" name="category[]" value="any" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">Any</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-1" name="category[]" value="below-10" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Below 10</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-2" name="category[]" value="below-20" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Below 20</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-3" name="category[]" value="below-30" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Below 30</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-4" name="category[]" value="below-50" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Below 50</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-2" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Location</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-2">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-size-0" name="size[]" value="united-states" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">United States (57)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-1" name="size[]" value="india" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">India (22)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-2" name="size[]" value="united-kingdom" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">United Kingdom (8)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-3" name="size[]" value="canada" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">
                        Canada (7)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-4" name="size[]" value="philippines" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">Philippines (5)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-5" name="size[]" value="moroccco" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">Morocco (2)</label>
                    </div>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>