import React from 'react';
import { Carousel as MantineCarousel, useAnimationOffsetEffect } from '@mantine/carousel';

function Carousel({ wire, mingleData }) {
    const {
        slideSize,
        slideGap,
        orientation,
        slidesToScroll,
        align,
        breakpoints,
        dragFree,
        draggable,
        loop,
        withControls,
        withIndicators,
        controlsOffset,
        controlSize,
        nextControlIcon,
        previousControlIcon,
        height,
        includeGapInSize,
        containScroll,
        plugins,
        initialSlide,
        getEmblaApi,
        classNames,
        styles,
    } = mingleData;

    // Add animation offset effect if getEmblaApi is provided
    useAnimationOffsetEffect(getEmblaApi, 200);

    return (
        <MantineCarousel
            slideSize={slideSize}
            slideGap={slideGap}
            orientation={orientation}
            slidesToScroll={slidesToScroll}
            align={align}
            breakpoints={breakpoints}
            dragFree={dragFree}
            draggable={draggable}
            loop={loop}
            withControls={withControls}
            withIndicators={withIndicators}
            controlsOffset={controlsOffset}
            controlSize={controlSize}
            nextControlIcon={nextControlIcon}
            previousControlIcon={previousControlIcon}
            height={height}
            includeGapInSize={includeGapInSize}
            containScroll={containScroll}
            plugins={plugins}
            initialSlide={initialSlide}
            getEmblaApi={getEmblaApi}
            classNames={classNames}
            styles={styles}
        >
            {mingleData.children}
        </MantineCarousel>
    );
}

// Add Slide component as a static property
Carousel.Slide = MantineCarousel.Slide;

export default Carousel;
