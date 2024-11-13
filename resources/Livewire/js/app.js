import './bootstrap';
import { MantineProvider, createTheme } from '@mantine/core';
import { useColorScheme } from '@mantine/hooks';
import { Notifications } from '@mantine/notifications';

// Create theme with your customizations
const theme = createTheme({
    primaryColor: 'blue',
    fontFamily: 'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif',
    defaultRadius: 'md',
    components: {
        Button: {
            defaultProps: {
                size: 'md',
            },
        },
        TextInput: {
            defaultProps: {
                size: 'md',
            },
        },
        Select: {
            defaultProps: {
                size: 'md',
            },
        },
    },
});

// Initialize Mantine
document.addEventListener('livewire:init', () => {
    const colorScheme = useColorScheme();

    // Set up Mantine provider
    Livewire.hook('request', ({ component, commit }) => {
        // Wrap component in MantineProvider
        component.el.wrap(
            <MantineProvider 
                theme={theme}
                defaultColorScheme={colorScheme}
                withNormalizeCSS
                withGlobalStyles
            >
                <Notifications position="top-right" />
                {component.el}
            </MantineProvider>
        );
    });

    // Handle dark mode toggle
    window.toggleDarkMode = () => {
        const html = document.documentElement;
        html.classList.toggle('dark');
        
        // Store preference
        if (html.classList.contains('dark')) {
            localStorage.setItem('color-scheme', 'dark');
        } else {
            localStorage.setItem('color-scheme', 'light');
        }
    };

    // Initialize dark mode from stored preference
    const storedScheme = localStorage.getItem('color-scheme');
    if (storedScheme === 'dark' || (!storedScheme && colorScheme === 'dark')) {
        document.documentElement.classList.add('dark');
    }
});
