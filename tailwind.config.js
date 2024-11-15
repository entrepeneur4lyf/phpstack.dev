/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.jsx',
    './resources/MantineLiveWire/**/*.{php,js,jsx}',
  ],
  corePlugins: {
    preflight: false, // Disable Tailwind's reset to avoid conflicts with Mantine
  },
  important: true, // Make Tailwind styles take precedence
  theme: {
    extend: {
      colors: {
        // Match Mantine's color scheme
        primary: 'var(--mantine-color-primary)',
        dark: 'var(--mantine-color-dark)',
        gray: 'var(--mantine-color-gray)',
      },
      spacing: {
        // Match Mantine's spacing scale
        xs: 'var(--mantine-spacing-xs)',
        sm: 'var(--mantine-spacing-sm)',
        md: 'var(--mantine-spacing-md)',
        lg: 'var(--mantine-spacing-lg)',
        xl: 'var(--mantine-spacing-xl)',
      },
      borderRadius: {
        // Match Mantine's radius scale
        sm: 'var(--mantine-radius-sm)',
        md: 'var(--mantine-radius-md)',
        lg: 'var(--mantine-radius-lg)',
        xl: 'var(--mantine-radius-xl)',
      },
    },
  },
  plugins: [],
}
