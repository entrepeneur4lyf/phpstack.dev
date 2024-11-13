import React from 'react';
import { PieChart as MantinePieChart } from '@mantine/charts';

function PieChart({ wire, mingleData }) {
    const {
        data,
        size,
        withTooltip,
        tooltipDataSource,
        withLabels,
        withLabelsLine,
        labelsPosition,
        labelsType,
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
        <MantinePieChart
            data={data}
            size={size}
            withTooltip={withTooltip}
            tooltipDataSource={tooltipDataSource}
            withLabels={withLabels}
            withLabelsLine={withLabelsLine}
            labelsPosition={labelsPosition}
            labelsType={labelsType}
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

export default PieChart;
