<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePagination extends Component
{
    public $activePage = 1;
    public $items = [];

    public function mount()
    {
        // Generate sample data
        for ($i = 0; $i < 30; $i++) {
            $this->items[] = [
                'id' => $i,
                'name' => 'Item ' . ($i + 1),
            ];
        }
    }

    public function setPage($page)
    {
        $this->activePage = $page;
    }

    public function render()
    {
        // Chunk items into groups of 5 for pagination
        $chunks = array_chunk($this->items, 5);
        $currentItems = $chunks[$this->activePage - 1] ?? [];

        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-pagination :total="10" />

                <!-- With active page -->
                <div class="mt-4">
                    <x-mantine-pagination
                        :total="10"
                        :value="$activePage"
                        :on-change="fn($page) => $this->setPage($page)"
                    />
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-pagination :total="10" size="xs" />
                        <x-mantine-pagination :total="10" size="sm" />
                        <x-mantine-pagination :total="10" size="md" />
                        <x-mantine-pagination :total="10" size="lg" />
                        <x-mantine-pagination :total="10" size="xl" />
                    </x-mantine-group>
                </div>

                <!-- Different radius -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-pagination :total="10" radius="xs" />
                        <x-mantine-pagination :total="10" radius="sm" />
                        <x-mantine-pagination :total="10" radius="md" />
                        <x-mantine-pagination :total="10" radius="lg" />
                        <x-mantine-pagination :total="10" radius="xl" />
                    </x-mantine-group>
                </div>

                <!-- With edges -->
                <div class="mt-4">
                    <x-mantine-pagination :total="10" :with-edges="true" />
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-pagination :total="10" :disabled="true" />
                </div>

                <!-- With custom siblings and boundaries -->
                <div class="mt-4">
                    <div class="mb-2">1 sibling (default)</div>
                    <x-mantine-pagination :total="20" :siblings="1" :default-value="10" />

                    <div class="mt-4 mb-2">2 siblings</div>
                    <x-mantine-pagination :total="20" :siblings="2" :default-value="10" />

                    <div class="mt-4 mb-2">3 siblings</div>
                    <x-mantine-pagination :total="20" :siblings="3" :default-value="10" />

                    <div class="mt-4 mb-2">2 boundaries</div>
                    <x-mantine-pagination :total="20" :boundaries="2" :default-value="10" />
                </div>

                <!-- With auto contrast -->
                <div class="mt-4">
                    <x-mantine-pagination :total="10" color="lime.4" />
                    <x-mantine-pagination :total="10" color="lime.4" :auto-contrast="true" class="mt-2" />
                </div>

                <!-- Example with chunked content -->
                <div class="mt-4">
                    @foreach($currentItems as $item)
                        <x-mantine-text>
                            id: {{ $item['id'] }}, name: {{ $item['name'] }}
                        </x-mantine-text>
                    @endforeach

                    <x-mantine-pagination
                        class="mt-2"
                        :total="count($chunks)"
                        :value="$activePage"
                        :on-change="fn($page) => $this->setPage($page)"
                    />
                </div>

                <!-- Using compound components -->
                <div class="mt-4">
                    <x-mantine-pagination-root :total="10">
                        <x-mantine-group gap="5" justify="center">
                            <x-mantine-pagination-first />
                            <x-mantine-pagination-previous />
                            <x-mantine-pagination-items />
                            <x-mantine-pagination-next />
                            <x-mantine-pagination-last />
                        </x-mantine-group>
                    </x-mantine-pagination-root>
                </div>

                <!-- With custom icons -->
                <div class="mt-4">
                    <x-mantine-pagination
                        :total="10"
                        :with-edges="true"
                        :next-icon="'<i class=\"fas fa-arrow-right\"></i>'"
                        :previous-icon="'<i class=\"fas fa-arrow-left\"></i>'"
                        :first-icon="'<i class=\"fas fa-angle-double-left\"></i>'"
                        :last-icon="'<i class=\"fas fa-angle-double-right\"></i>'"
                        :dots-icon="'<i class=\"fas fa-ellipsis-h\"></i>'"
                    />
                </div>

                <!-- With links -->
                <div class="mt-4">
                    <x-mantine-pagination
                        :total="10"
                        :with-edges="true"
                        :get-item-props="fn($page) => ['component' => 'a', 'href' => '#page-' . $page]"
                        :get-control-props="fn($control) => [
                            'component' => 'a',
                            'href' => match($control) {
                                'first' => '#page-1',
                                'last' => '#page-10',
                                'next' => '#page-' . min($activePage + 1, 10),
                                'previous' => '#page-' . max($activePage - 1, 1),
                                default => '#'
                            }
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
