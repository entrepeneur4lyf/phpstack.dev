import React from 'react';
import { NavigationProgress as MantineNavigationProgress, nprogress } from '@mantine/nprogress';

// Export nprogress for use in other components
export { nprogress };

function NavigationProgress({ wire, mingleData }) {
    const {
        initialProgress,
        color,
        height,
        radius,
        autoReset,
        transitionDuration,
        progressLabel,
        classNames,
        styles,
    } = mingleData;

    // Set up Livewire event listeners for progress control
    React.useEffect(() => {
        wire.on('start', () => nprogress.start());
        wire.on('stop', () => nprogress.stop());
        wire.on('increment', () => nprogress.increment());
        wire.on('decrement', () => nprogress.decrement());
        wire.on('set', (value) => nprogress.set(value));
        wire.on('reset', () => nprogress.reset());
        wire.on('complete', () => nprogress.complete());
    }, [wire]);

    return (
        <MantineNavigationProgress
            initialProgress={initialProgress}
            color={color}
            height={height}
            radius={radius}
            autoReset={autoReset}
            transitionDuration={transitionDuration}
            progressLabel={progressLabel}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default NavigationProgress;
