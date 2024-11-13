import React from 'react';
import { Sparkline as MantineSparkline } from '@mantine/charts';

function Sparkline({ wire, mingleData }) {
    const {
        data,
        w,
        h,
        curveType,
        color,
        fillOpacity,
        strokeWidth,
        trendColors,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineSparkline
            data={data}
            w={w}
            h={h}
            curveType={curveType}
            color={color}
            fillOpacity={fillOpacity}
            strokeWidth={strokeWidth}
            trendColors={trendColors}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default Sparkline;
