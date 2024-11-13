<div>
    <x-mantine-action-icon
        variant="subtle"
        size="lg"
        wire:click="toggleColorScheme"
        aria-label="Toggle color scheme"
    >
        @if($colorScheme === 'dark')
            <x-mantine-icon name="sun" size="1.2rem" />
        @else
            <x-mantine-icon name="moon" size="1.2rem" />
        @endif
    </x-mantine-action-icon>

    @script
    <script>
        // Listen for color scheme updates
        $wire.on('color-scheme-updated', ({ scheme }) => {
            // Update data-mantine-color-scheme attribute
            document.documentElement.setAttribute('data-mantine-color-scheme', scheme);
            
            // Store preference
            localStorage.setItem('mantine-color-scheme', scheme);
            
            // Update system preference
            if (window.matchMedia('(prefers-color-scheme: dark)').matches !== (scheme === 'dark')) {
                window.matchMedia('(prefers-color-scheme: dark)').dispatchEvent(new Event('change'));
            }
        });

        // Initialize color scheme from stored preference
        const storedScheme = localStorage.getItem('mantine-color-scheme');
        if (storedScheme) {
            document.documentElement.setAttribute('data-mantine-color-scheme', storedScheme);
        }

        // Listen for system preference changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            const newScheme = e.matches ? 'dark' : 'light';
            if (!localStorage.getItem('mantine-color-scheme')) {
                document.documentElement.setAttribute('data-mantine-color-scheme', newScheme);
                $wire.setColorScheme(newScheme);
            }
        });
    </script>
    @endscript
</div>
