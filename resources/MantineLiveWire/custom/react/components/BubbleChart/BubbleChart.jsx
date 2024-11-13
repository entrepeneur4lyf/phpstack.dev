import React from 'react';
import { BubbleChart as MantineBubbleChart } from '@mantine/charts';

function BubbleChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        range,
        label,
        color,
        h,
        w,
        withTooltip,
        tooltipProps,
        valueFormatter,
        gridColor,
        textColor,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineBubbleChart
            data={data}
            dataKey={dataKey}
            range={range}
            label={label}
            color={color}
            h={h}
            w={w}
            withTooltip={withTooltip}
            tooltipProps={tooltipProps}
            valueFormatter={valueFormatter}
            gridColor={gridColor}
            textColor={textColor}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default BubbleChart;
