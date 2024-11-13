/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.jsx',
  ],
  corePlugins: {
    preflight: false, // Disable Tailwind's reset to avoid conflicts with Mantine
  },
  important: '#tailwind', // Scope Tailwind styles to avoid conflicts
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
