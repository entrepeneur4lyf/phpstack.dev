<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTable extends Component
{
    public $selectedRows = [];

    public function toggleRow($position)
    {
        if (in_array($position, $this->selectedRows)) {
            $this->selectedRows = array_diff($this->selectedRows, [$position]);
        } else {
            $this->selectedRows[] = $position;
        }
    }

    public function render()
    {
        $elements = [
            ['position' => 6, 'mass' => 12.011, 'symbol' => 'C', 'name' => 'Carbon'],
            ['position' => 7, 'mass' => 14.007, 'symbol' => 'N', 'name' => 'Nitrogen'],
            ['position' => 39, 'mass' => 88.906, 'symbol' => 'Y', 'name' => 'Yttrium'],
            ['position' => 56, 'mass' => 137.33, 'symbol' => 'Ba', 'name' => 'Barium'],
            ['position' => 58, 'mass' => 140.12, 'symbol' => 'Ce', 'name' => 'Cerium'],
        ];

        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-table>
                        <x-mantine-table-thead>
                            <x-mantine-table-tr>
                                <x-mantine-table-th>Element position</x-mantine-table-th>
                                <x-mantine-table-th>Element name</x-mantine-table-th>
                                <x-mantine-table-th>Symbol</x-mantine-table-th>
                                <x-mantine-table-th>Atomic mass</x-mantine-table-th>
                            </x-mantine-table-tr>
                        </x-mantine-table-thead>
                        <x-mantine-table-tbody>
                            @foreach($elements as $element)
                                <x-mantine-table-tr>
                                    <x-mantine-table-td>{{ $element['position'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['name'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['symbol'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['mass'] }}</x-mantine-table-td>
                                </x-mantine-table-tr>
                            @endforeach
                        </x-mantine-table-tbody>
                    </x-mantine-table>
                </div>

                <!-- With data prop -->
                <div class="mt-8">
                    <x-mantine-table
                        :data="[
                            'caption' => 'Some elements from periodic table',
                            'head' => ['Element position', 'Atomic mass', 'Symbol', 'Element name'],
                            'body' => [
                                [6, 12.011, 'C', 'Carbon'],
                                [7, 14.007, 'N', 'Nitrogen'],
                                [39, 88.906, 'Y', 'Yttrium'],
                                [56, 137.33, 'Ba', 'Barium'],
                                [58, 140.12, 'Ce', 'Cerium'],
                            ],
                        ]"
                    />
                </div>

                <!-- With sticky header -->
                <div class="mt-8">
                    <x-mantine-table :sticky-header="true" :sticky-header-offset="60">
                        <x-mantine-table-caption>Scroll page to see sticky thead</x-mantine-table-caption>
                        <x-mantine-table-thead>
                            <x-mantine-table-tr>
                                <x-mantine-table-th>Element position</x-mantine-table-th>
                                <x-mantine-table-th>Element name</x-mantine-table-th>
                                <x-mantine-table-th>Symbol</x-mantine-table-th>
                                <x-mantine-table-th>Atomic mass</x-mantine-table-th>
                            </x-mantine-table-tr>
                        </x-mantine-table-thead>
                        <x-mantine-table-tbody>
                            @foreach($elements as $element)
                                <x-mantine-table-tr>
                                    <x-mantine-table-td>{{ $element['position'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['name'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['symbol'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['mass'] }}</x-mantine-table-td>
                                </x-mantine-table-tr>
                            @endforeach
                        </x-mantine-table-tbody>
                    </x-mantine-table>
                </div>

                <!-- With scroll container -->
                <div class="mt-8">
                    <x-mantine-table-scroll-container :min-width="500">
                        <x-mantine-table>
                            <x-mantine-table-thead>
                                <x-mantine-table-tr>
                                    <x-mantine-table-th>Element position</x-mantine-table-th>
                                    <x-mantine-table-th>Element name</x-mantine-table-th>
                                    <x-mantine-table-th>Symbol</x-mantine-table-th>
                                    <x-mantine-table-th>Atomic mass</x-mantine-table-th>
                                </x-mantine-table-tr>
                            </x-mantine-table-thead>
                            <x-mantine-table-tbody>
                                @foreach($elements as $element)
                                    <x-mantine-table-tr>
                                        <x-mantine-table-td>{{ $element['position'] }}</x-mantine-table-td>
                                        <x-mantine-table-td>{{ $element['name'] }}</x-mantine-table-td>
                                        <x-mantine-table-td>{{ $element['symbol'] }}</x-mantine-table-td>
                                        <x-mantine-table-td>{{ $element['mass'] }}</x-mantine-table-td>
                                    </x-mantine-table-tr>
                                @endforeach
                            </x-mantine-table-tbody>
                        </x-mantine-table>
                    </x-mantine-table-scroll-container>
                </div>

                <!-- With row selection -->
                <div class="mt-8">
                    <x-mantine-table>
                        <x-mantine-table-thead>
                            <x-mantine-table-tr>
                                <x-mantine-table-th />
                                <x-mantine-table-th>Element position</x-mantine-table-th>
                                <x-mantine-table-th>Element name</x-mantine-table-th>
                                <x-mantine-table-th>Symbol</x-mantine-table-th>
                                <x-mantine-table-th>Atomic mass</x-mantine-table-th>
                            </x-mantine-table-tr>
                        </x-mantine-table-thead>
                        <x-mantine-table-tbody>
                            @foreach($elements as $element)
                                <x-mantine-table-tr :bg="in_array($element['position'], $selectedRows) ? 'var(--mantine-color-blue-light)' : null">
                                    <x-mantine-table-td>
                                        <x-mantine-checkbox
                                            :checked="in_array($element['position'], $selectedRows)"
                                            :on-change="fn() => $this->toggleRow($element['position'])"
                                        />
                                    </x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['position'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['name'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['symbol'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['mass'] }}</x-mantine-table-td>
                                </x-mantine-table-tr>
                            @endforeach
                        </x-mantine-table-tbody>
                    </x-mantine-table>
                </div>

                <!-- With different styles -->
                <div class="mt-8">
                    <x-mantine-table
                        :striped="true"
                        :highlight-on-hover="true"
                        :with-table-border="true"
                        :with-column-borders="true"
                        horizontal-spacing="xl"
                        vertical-spacing="md"
                    >
                        <x-mantine-table-thead>
                            <x-mantine-table-tr>
                                <x-mantine-table-th>Element position</x-mantine-table-th>
                                <x-mantine-table-th>Element name</x-mantine-table-th>
                                <x-mantine-table-th>Symbol</x-mantine-table-th>
                                <x-mantine-table-th>Atomic mass</x-mantine-table-th>
                            </x-mantine-table-tr>
                        </x-mantine-table-thead>
                        <x-mantine-table-tbody>
                            @foreach($elements as $element)
                                <x-mantine-table-tr>
                                    <x-mantine-table-td>{{ $element['position'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['name'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['symbol'] }}</x-mantine-table-td>
                                    <x-mantine-table-td>{{ $element['mass'] }}</x-mantine-table-td>
                                </x-mantine-table-tr>
                            @endforeach
                        </x-mantine-table-tbody>
                    </x-mantine-table>
                </div>
            </div>
        blade;
    }
}
