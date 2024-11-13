import { useAutoAnimate } from '@formkit/auto-animate/react';

// Get animation configuration from props or config
export const getAnimationConfig = (props, config) => {
    const enabled = props?.animation?.enabled ?? config?.enabled ?? true;
    if (!enabled) return null;

    return {
        duration: props?.animation?.duration ?? config?.autoAnimate?.duration ?? 250,
        easing: props?.animation?.easing ?? config?.autoAnimate?.easing ?? 'ease-in-out',
        disrespectUserMotionPreference: props?.animation?.disrespectUserMotionPreference ?? 
            config?.autoAnimate?.disrespectUserMotionPreference ?? false,
    };
};

// Create animation hook with configuration
export const useTableAnimation = (props, config) => {
    const animationConfig = getAnimationConfig(props, config);
    
    // If animations are disabled, return null ref
    if (!animationConfig) {
        return [null];
    }

    // Check if we should disable animations based on performance settings
    const shouldDisableForPerformance = (records) => {
        if (!config?.performance?.disableThreshold) return false;
        return records?.length > config.performance.disableThreshold;
    };

    // Check if we should respect reduced motion preference
    const shouldRespectReducedMotion = () => {
        if (animationConfig.disrespectUserMotionPreference) return false;
        if (!config?.performance?.respectReducedMotion) return false;
        return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    };

    // Create animation hook with conditional config
    const [parent] = useAutoAnimate(
        shouldDisableForPerformance(props?.records) || shouldRespectReducedMotion()
            ? false 
            : animationConfig
    );

    return [parent];
};

// Debug animation events if enabled
export const debugAnimation = (event, config) => {
    if (!config?.debug?.logEvents) return;

    console.log('[DataTable Animation]', {
        event,
        timestamp: new Date().toISOString(),
        config,
    });
};

// Get animation classes if debug mode is enabled
export const getAnimationDebugClasses = (config) => {
    if (!config?.debug?.addClasses) return '';

    return 'datatable-animated';
};

// Get animation styles based on configuration
export const getAnimationStyles = (config) => {
    if (!config?.performance?.useHardwareAcceleration) return {};

    return {
        transform: 'translateZ(0)', // Force hardware acceleration
        backfaceVisibility: 'hidden',
        perspective: 1000,
    };
};

// Apply debug slow motion if enabled
export const getDebugDuration = (duration, config) => {
    if (!config?.debug?.slowMotion) return duration;

    return duration * 5; // Slow down animations by 5x for debugging
};
