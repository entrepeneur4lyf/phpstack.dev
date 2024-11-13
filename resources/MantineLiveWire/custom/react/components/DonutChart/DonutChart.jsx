import React from 'react';
import { DonutChart as MantineDonutChart } from '@mantine/charts';

function DonutChart({ wire, mingleData }) {
    const {
        data,
        size,
        thickness,
        paddingAngle,
        withTooltip,
        tooltipDataSource,
        withLabels,
        withLabelsLine,
        chartLabel,
        startAngle,
        endAngle,
        strokeWidth,
        strokeColor,
        h,
        w,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDonutChart
            data={data}
            size={size}
            thickness={thickness}
            paddingAngle={paddingAngle}
            withTooltip={withTooltip}
            tooltipDataSource={tooltipDataSource}
            withLabels={withLabels}
            withLabelsLine={withLabelsLine}
            chartLabel={chartLabel}
            startAngle={startAngle}
            endAngle={endAngle}
            strokeWidth={strokeWidth}
            strokeColor={strokeColor}
            h={h}
            w={w}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default DonutChart;
