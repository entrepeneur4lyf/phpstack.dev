import React from 'react';
import { ScatterChart as MantineScatterChart } from '@mantine/charts';

function ScatterChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        h,
        w,
        withLegend,
        legendProps,
        withTooltip,
        tooltipProps,
        tooltipAnimationDuration,
        xAxisProps,
        yAxisProps,
        gridAxis,
        tickLine,
        strokeDasharray,
        unit,
        valueFormatter,
        pointLabels,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        labels,
        scatterProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineScatterChart
            data={data}
            dataKey={dataKey}
            h={h}
            w={w}
            withLegend={withLegend}
            legendProps={legendProps}
            withTooltip={withTooltip}
            tooltipProps={tooltipProps}
            tooltipAnimationDuration={tooltipAnimationDuration}
            xAxisProps={xAxisProps}
            yAxisProps={yAxisProps}
            gridAxis={gridAxis}
            tickLine={tickLine}
            strokeDasharray={strokeDasharray}
            unit={unit}
            valueFormatter={valueFormatter}
            pointLabels={pointLabels}
            gridColor={gridColor}
            textColor={textColor}
            referenceLines={referenceLines}
            xAxisLabel={xAxisLabel}
            yAxisLabel={yAxisLabel}
            labels={labels}
            scatterProps={scatterProps}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default ScatterChart;
