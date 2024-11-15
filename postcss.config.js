const mantineBreakpoints = {
  xs: '36em',
  sm: '48em',
  md: '62em',
  lg: '75em',
  xl: '88em',
};

module.exports = {
  plugins: {
    'tailwindcss': {},
    'autoprefixer': {},
    'postcss-preset-mantine': {
      dir: 'ltr',
      theme: {
        breakpoints: mantineBreakpoints,
      },
    },
    'postcss-simple-vars': {
      variables: {
        ...Object.entries(mantineBreakpoints).reduce((acc, [key, value]) => ({
          ...acc,
          [`mantine-breakpoint-${key}`]: value,
        }), {}),
        'motion-ease': 'cubic-bezier(0.4, 0, 0.2, 1)',
        'motion-duration': '300ms',
      },
    },
    'postcss-nested': {},
    'postcss-mixins': {
      mixins: {
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
        reduce_motion(mixin) {
          return {
            '@media (prefers-reduced-motion: reduce)': {
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
        smaller_than(mixin, breakpoint) {
          return {
            [`@media (max-width: ${mantineBreakpoints[breakpoint]})`]: {
              '@mixin-content': {},
            },
          };
        },
      },
    },
    ...(process.env.NODE_ENV === 'production' ? { cssnano: {} } : {}),
  },
};
