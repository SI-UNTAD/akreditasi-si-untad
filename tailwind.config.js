// tailwind.config.js
/** @type {import('tailwindcss').Config} */
export default {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './app/Livewire/**/*.php',
      './app/View/Components/**/*.php',
      './app/**/*.php',
    ],

    safelist: [
        'px-margin-page',
        'max-w-container-max',
        'gap-section-gap',
        'text-h1', 'text-h2', 'text-h3', 'text-h4',
        'text-body-md', 'text-body-lg', 'text-label-sm',
        'font-h1', 'font-h2', 'font-h3',
        'font-body-md', 'font-body-lg', 'font-label-sm',
    ],

    darkMode: 'class',
    theme: {
      extend: {
        colors: {
          // ─── IS TADULAKO Design Tokens ───
          primary:                    '#003d9b',
          'primary-container':        '#0052cc',
          'primary-fixed':            '#dae2ff',
          'primary-fixed-dim':        '#b2c5ff',
          'inverse-primary':          '#b2c5ff',
          'on-primary':               '#ffffff',
          'on-primary-fixed':         '#001848',
          'on-primary-fixed-variant': '#0040a2',
          'on-primary-container':     '#c4d2ff',
  
          secondary:                  '#735c00',
          'secondary-container':      '#fed65b',
          'secondary-fixed':          '#ffe088',
          'secondary-fixed-dim':      '#e9c349',
          'on-secondary':             '#ffffff',
          'on-secondary-fixed':       '#241a00',
          'on-secondary-container':   '#745c00',
  
          tertiary:                   '#7b2600',
          'tertiary-container':       '#a33500',
          'tertiary-fixed':           '#ffdbcf',
          'tertiary-fixed-dim':       '#ffb59b',
          'on-tertiary':              '#ffffff',
          'on-tertiary-fixed':        '#380d00',
          'on-tertiary-container':    '#ffc6b2',
  
          background:                 '#f9f9ff',
          surface:                    '#f9f9ff',
          'surface-bright':           '#f9f9ff',
          'surface-dim':              '#d3daea',
          'surface-variant':          '#dce2f3',
          'surface-container':        '#e7eefe',
          'surface-container-low':    '#f0f3ff',
          'surface-container-high':   '#e2e8f8',
          'surface-container-highest':'#dce2f3',
          'surface-container-lowest': '#ffffff',
          'surface-tint':             '#0c56d0',
  
          'on-background':            '#151c27',
          'on-surface':               '#151c27',
          'on-surface-variant':       '#434654',
          'inverse-surface':          '#2a313d',
          'inverse-on-surface':       '#ebf1ff',
  
          outline:                    '#737685',
          'outline-variant':          '#c3c6d6',
  
          error:                      '#ba1a1a',
          'error-container':          '#ffdad6',
          'on-error':                 '#ffffff',
          'on-error-container':       '#93000a',
        },
        borderRadius: {
          DEFAULT: '0.25rem',
          lg:      '0.5rem',
          xl:      '0.75rem',
          '2xl':   '1.5rem',
          full:    '9999px',
        },
        spacing: {
          'container-max': '1280px',
          unit:            '8px',
          'margin-page':   '64px',
          'section-gap':   '120px',
          gutter:          '32px',
        },
        fontFamily: {
          sans:       ['Inter', 'sans-serif'],
          'body-md':  ['Inter', 'sans-serif'],
          'body-lg':  ['Inter', 'sans-serif'],
          h1:         ['Inter', 'sans-serif'],
          h2:         ['Inter', 'sans-serif'],
          h3:         ['Inter', 'sans-serif'],
          'label-sm': ['Inter', 'sans-serif'],
        },
        fontSize: {
          'label-sm': ['13px', { lineHeight: '1.2', letterSpacing: '0.05em', fontWeight: '600' }],
          'body-md':  ['16px', { lineHeight: '1.6', fontWeight: '400' }],
          'body-lg':  ['18px', { lineHeight: '1.6', fontWeight: '400' }],
          h3:         ['24px', { lineHeight: '1.4', fontWeight: '600' }],
          h2:         ['32px', { lineHeight: '1.3', letterSpacing: '-0.01em', fontWeight: '600' }],
          h1:         ['48px', { lineHeight: '1.2', letterSpacing: '-0.02em', fontWeight: '700' }],
        },
        maxWidth: {
          'container-max': '1280px',
        },
      },
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  };