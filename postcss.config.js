const mantineBreakpoints = {
  xs: '36em',
  sm: '48em',
  md: '62em',
  lg: '75em',
  xl: '88em',
};

module.exports = {
  plugins: {
    // Enable Mantine's PostCSS preset for rem(), light-dark() functions
    'postcss-preset-mantine': {
      dir: 'ltr',
      theme: {
        breakpoints: mantineBreakpoints,
      },
    },

    // Define variables for breakpoints
    'postcss-simple-vars': {
      variables: Object.entries(mantineBreakpoints).reduce((acc, [key, value]) => ({
        ...acc,
        [`mantine-breakpoint-${key}`]: value,
      }), {}),
    },

    // Define mixins for color scheme and responsive design
    'postcss-mixins': {
      mixins: {
        dark(mixin) {
          return {
            '@media (prefers-color-scheme: dark)': {
              '[data-mantine-color-scheme="auto"] &': {
                '@mixin-content': {},
              },
              '[data-mantine-color-scheme="dark"] &': {
                '@mixin-content': {},
              },
            },
          };
        },

        light(mixin) {
          return {
            '@media (prefers-color-scheme: light)': {
              '[data-mantine-color-scheme="auto"] &': {
                '@mixin-content': {},
              },
              '[data-mantine-color-scheme="light"] &': {
                '@mixin-content': {},
              },
            },
          };
        },

        hover(mixin) {
          return {
            '@media (hover: hover)': {
              '&:hover': {
                '@mixin-content': {},
              },
            },
            '@media (hover: none)': {
              '&:active': {
                '@mixin-content': {},
              },
            },
          };
        },

        rtl(mixin) {
          return {
            '[dir="rtl"] &': {
              '@mixin-content': {},
            },
          };
        },

        ltr(mixin) {
          return {
            '[dir="ltr"] &': {
              '@mixin-content': {},
            },
          };
        },

        reduce_motion(mixin) {
          return {
            '@media (prefers-reduced-motion: reduce)': {
              '@mixin-content': {},
            },
          };
        },

        smaller_than(mixin, breakpoint) {
          return {
            [`@media (max-width: ${mantineBreakpoints[breakpoint]})`]: {
              '@mixin-content': {},
            },
          };
        },

        larger_than(mixin, breakpoint) {
          return {
            [`@media (min-width: ${mantineBreakpoints[breakpoint]})`]: {
              '@mixin-content': {},
            },
          };
        },
      },
    },

    // Enable nesting
    'postcss-nested': {},

    // Add vendor prefixes
    autoprefixer: {},

    // Minify in production
    ...(process.env.NODE_ENV === 'production' ? { cssnano: {} } : {}),
  },
};
