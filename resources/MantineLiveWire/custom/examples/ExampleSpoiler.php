<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSpoiler extends Component
{
    public $expanded = false;

    public function toggleExpanded()
    {
        $this->expanded = !$this->expanded;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-spoiler
                        :max-height="120"
                        show-label="Show more"
                        hide-label="Hide"
                    >
                        <x-mantine-image
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Rock_in_caputh-WBTBWB-47.jpg/600px-Rock_in_caputh-WBTBWB-47.jpg"
                            alt="We Butter the Bread with Butter"
                        />

                        <p>
                            We Butter the Bread with Butter was founded in 2007 by Marcel Neumann, who was originally guitarist
                            for Martin Kesici's band, and Tobias Schultka. The band was originally meant as a joke, but
                            progressed into being a more serious musical duo. The name for the band has no particular meaning,
                            although its origins were suggested from when the two original members were driving in a car
                            operated by Marcel Neumann and an accident almost occurred. Neumann found Schultka "so funny that
                            he briefly lost control of the vehicle." Many of their songs from this point were covers of German
                            folk tales and nursery rhymes.
                        </p>
                    </x-mantine-spoiler>
                </div>

                <!-- Controlled state -->
                <div class="mt-8">
                    <x-mantine-spoiler
                        show-label="Show more"
                        hide-label="Hide details"
                        :expanded="$expanded"
                        :on-expanded-change="fn($value) => $this->toggleExpanded()"
                    >
                        <x-mantine-image
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Rock_in_caputh-WBTBWB-47.jpg/600px-Rock_in_caputh-WBTBWB-47.jpg"
                            alt="We Butter the Bread with Butter"
                        />

                        <p>
                            We Butter the Bread with Butter was founded in 2007 by Marcel Neumann, who was originally guitarist
                            for Martin Kesici's band, and Tobias Schultka. The band was originally meant as a joke, but
                            progressed into being a more serious musical duo.
                        </p>
                    </x-mantine-spoiler>
                </div>

                <!-- Without transition -->
                <div class="mt-8">
                    <x-mantine-spoiler
                        :max-height="120"
                        show-label="Show more"
                        hide-label="Hide"
                        :transition-duration="0"
                    >
                        <x-mantine-image
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Rock_in_caputh-WBTBWB-47.jpg/600px-Rock_in_caputh-WBTBWB-47.jpg"
                            alt="We Butter the Bread with Butter"
                        />

                        <p>
                            We Butter the Bread with Butter was founded in 2007 by Marcel Neumann, who was originally guitarist
                            for Martin Kesici's band, and Tobias Schultka. The band was originally meant as a joke, but
                            progressed into being a more serious musical duo. The name for the band has no particular meaning,
                            although its origins were suggested from when the two original members were driving in a car
                            operated by Marcel Neumann and an accident almost occurred.
                        </p>
                    </x-mantine-spoiler>
                </div>

                <!-- With different max heights -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-spoiler
                            :max-height="50"
                            show-label="Show more"
                            hide-label="Hide"
                        >
                            <p>
                                Short text with small max height. We Butter the Bread with Butter was founded in 2007 by
                                Marcel Neumann.
                            </p>
                        </x-mantine-spoiler>

                        <x-mantine-spoiler
                            :max-height="150"
                            show-label="Show more"
                            hide-label="Hide"
                        >
                            <p>
                                Medium text with larger max height. We Butter the Bread with Butter was founded in 2007 by
                                Marcel Neumann, who was originally guitarist for Martin Kesici's band, and Tobias Schultka.
                                The band was originally meant as a joke, but progressed into being a more serious musical duo.
                            </p>
                        </x-mantine-spoiler>

                        <x-mantine-spoiler
                            :max-height="250"
                            show-label="Show more"
                            hide-label="Hide"
                        >
                            <p>
                                Long text with largest max height. We Butter the Bread with Butter was founded in 2007 by
                                Marcel Neumann, who was originally guitarist for Martin Kesici's band, and Tobias Schultka.
                                The band was originally meant as a joke, but progressed into being a more serious musical duo.
                                The name for the band has no particular meaning, although its origins were suggested from when
                                the two original members were driving in a car operated by Marcel Neumann and an accident
                                almost occurred. Neumann found Schultka "so funny that he briefly lost control of the vehicle."
                            </p>
                        </x-mantine-spoiler>
                    </x-mantine-stack>
                </div>
            </div>
        blade;
    }
}
