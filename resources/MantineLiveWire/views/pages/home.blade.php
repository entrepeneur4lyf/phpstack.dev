{{-- Hero Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-grid gutter="xl" align="center">
        <x-mantine-grid-col span="7">
            <x-mantine-stack gap="lg">
                {{-- Hero Title with animated text --}}
                <x-mantine-title
                    order="1"
                    size="60"
                    lh="1.1"
                    variant="gradient"
                    gradient="{ from: 'indigo', to: 'cyan' }"
                    class="hero-title"
                >
                    Modern PHP Development
                    <x-mantine-text.animated>
                        Made Simple
                    </x-mantine-text.animated>
                </x-mantine-title>

                {{-- Hero Description --}}
                <x-mantine-text size="xl" c="dimmed" maw="600" class="hero-description">
                    Build powerful web applications faster with Laravel, Livewire, and Mantine UI components. Now with smooth animations powered by Motion.
                </x-mantine-text>

                {{-- CTA Buttons --}}
                <x-mantine-group mt="xl" class="hero-cta">
                    <x-mantine-button size="lg">
                        Get Started
                    </x-mantine-button>
                    <x-mantine-button size="lg" variant="light">
                        View Documentation
                    </x-mantine-button>
                </x-mantine-group>
            </x-mantine-stack>
        </x-mantine-grid-col>

        {{-- Hero Image --}}
        <x-mantine-grid-col span="5">
            <x-mantine-image
                src="/images/hero.svg"
                alt="PHP Stack"
                :effect="'scale'"
            />
        </x-mantine-grid-col>
    </x-mantine-grid>
</x-mantine-container>

{{-- Brand Logos Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-stack gap="xl" align="center">
        <x-mantine-text ta="center" c="dimmed">
            Powered by industry-leading technologies
        </x-mantine-text>

        {{-- Logo Marquee with Motion animations --}}
        <div class="overflow-hidden w-full">
            <div class="animate-marquee">
                @foreach($this->getBrandLogos() as $brand)
                    <div class="flex-none mx-8">
                        <x-mantine-image
                            src="/images/brands/{{ $brand['logo'] }}"
                            alt="{{ $brand['name'] }}"
                            height="40"
                            fit="contain"
                            class="brand-logo"
                            :effect="'hover'"
                        />
                    </div>
                @endforeach
                {{-- Duplicate for seamless loop --}}
                @foreach($this->getBrandLogos() as $brand)
                    <div class="flex-none mx-8">
                        <x-mantine-image
                            src="/images/brands/{{ $brand['logo'] }}"
                            alt="{{ $brand['name'] }}"
                            height="40"
                            fit="contain"
                            class="brand-logo"
                            :effect="'hover'"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </x-mantine-stack>
</x-mantine-container>

{{-- Features Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-stack gap="xl" align="center">
        <x-mantine-title order="2" ta="center" maw="600">
            Everything You Need for Modern PHP Development
        </x-mantine-title>

        <x-mantine-text size="lg" c="dimmed" ta="center" maw="800">
            A complete development stack with pre-built components, animations, and tools to accelerate your workflow.
        </x-mantine-text>

        {{-- Feature Cards --}}
        <x-mantine-simple-grid cols="3" spacing="xl" class="stagger-children">
            @foreach($this->getFeatures() as $feature)
                <x-mantine-paper p="xl" radius="md" shadow="sm" class="feature-card">
                    <x-mantine-stack>
                        <x-mantine-action-icon
                            size="xl"
                            radius="md"
                            variant="light"
                            color="indigo"
                        >
                            <x-mantine-icon :name="$feature['icon']" />
                        </x-mantine-action-icon>

                        <x-mantine-title order="3" size="h4">
                            {{ $feature['title'] }}
                        </x-mantine-title>

                        <x-mantine-text c="dimmed">
                            {{ $feature['description'] }}
                        </x-mantine-text>
                    </x-mantine-stack>
                </x-mantine-paper>
            @endforeach
        </x-mantine-simple-grid>
    </x-mantine-stack>
</x-mantine-container>

{{-- Process Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-stack gap="xl">
        <x-mantine-title order="2" ta="center">
            Get Started in Minutes
        </x-mantine-title>

        {{-- Process Steps --}}
        @foreach($this->getSteps() as $step)
            <x-mantine-grid gutter="xl" align="center" class="process-step">
                {{-- Step content --}}
                <x-mantine-grid-col span="6" order="{{ $loop->even ? 2 : 1 }}">
                    <x-mantine-stack>
                        <x-mantine-text size="lg" fw="500" c="dimmed">
                            Step {{ $step['number'] }}
                        </x-mantine-text>

                        <x-mantine-title order="3">
                            {{ $step['title'] }}
                        </x-mantine-title>

                        <x-mantine-text c="dimmed">
                            {{ $step['description'] }}
                        </x-mantine-text>
                    </x-mantine-stack>
                </x-mantine-grid-col>

                {{-- Step image --}}
                <x-mantine-grid-col span="6" order="{{ $loop->even ? 1 : 2 }}">
                    <x-mantine-image
                        src="/images/steps/{{ $step['image'] }}"
                        alt="{{ $step['title'] }}"
                        radius="md"
                    />
                </x-mantine-grid-col>
            </x-mantine-grid>
        @endforeach
    </x-mantine-stack>
</x-mantine-container>

{{-- Tools Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-stack gap="xl" align="center">
        <x-mantine-title order="2" ta="center">
            Powerful Tools & Components
        </x-mantine-title>

        <x-mantine-text size="lg" c="dimmed" ta="center" maw="800">
            Everything you need to build modern web applications, right out of the box.
        </x-mantine-text>

        {{-- Tools Grid --}}
        <x-mantine-simple-grid cols="3" spacing="xl" class="stagger-children">
            @foreach($this->getTools() as $tool)
                <x-mantine-paper p="xl" radius="md" withBorder class="tool-card">
                    <x-mantine-stack>
                        <x-mantine-action-icon
                            size="xl"
                            radius="md"
                            variant="light"
                            color="indigo"
                        >
                            <x-mantine-icon :name="$tool['icon']" />
                        </x-mantine-action-icon>

                        <x-mantine-title order="4">
                            {{ $tool['title'] }}
                        </x-mantine-title>

                        <x-mantine-text c="dimmed">
                            {{ $tool['description'] }}
                        </x-mantine-text>
                    </x-mantine-stack>
                </x-mantine-paper>
            @endforeach
        </x-mantine-simple-grid>
    </x-mantine-stack>
</x-mantine-container>

{{-- FAQ Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-stack gap="xl" align="center">
        <x-mantine-title order="2" ta="center">
            Frequently Asked Questions
        </x-mantine-title>

        <x-mantine-accordion variant="separated" radius="md" w="100%" maw="800">
            @foreach($this->getFaqItems() as $faq)
                <x-mantine-accordion.item value="{{ $loop->index }}">
                    <x-mantine-accordion.control>
                        {{ $faq['question'] }}
                    </x-mantine-accordion.control>
                    <x-mantine-accordion.panel>
                        {{ $faq['answer'] }}
                    </x-mantine-accordion.panel>
                </x-mantine-accordion.item>
            @endforeach
        </x-mantine-accordion>
    </x-mantine-stack>
</x-mantine-container>

{{-- CTA Section --}}
<x-mantine-container size="xl" py="xl">
    <x-mantine-paper radius="lg" p="xl" bg="indigo">
        <x-mantine-stack align="center" gap="xl">
            <x-mantine-title order="2" c="white" ta="center">
                Ready to Build Something Amazing?
            </x-mantine-title>

            <x-mantine-text c="white" size="lg" ta="center" maw="800">
                Get started with PHP Stack today and experience the future of PHP development.
            </x-mantine-text>

            <x-mantine-button size="lg" color="white" variant="filled">
                Get Started Now
            </x-mantine-button>
        </x-mantine-stack>
    </x-mantine-paper>
</x-mantine-container>
