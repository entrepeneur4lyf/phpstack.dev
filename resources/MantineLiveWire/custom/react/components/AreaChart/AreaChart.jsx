import React from 'react';
import { AreaChart as MantineAreaChart } from '@mantine/charts';

function AreaChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        type,
        h,
        w,
        curveType,
        connectNulls,
        withDots,
        withGradient,
        withLegend,
        legendProps,
        withTooltip,
        tooltipProps,
        tooltipAnimationDuration,
        withXAxis,
        withYAxis,
        xAxisProps,
        yAxisProps,
        rightYAxisProps,
        withRightYAxis,
        gridAxis,
        tickLine,
        strokeDasharray,
        unit,
        valueFormatter,
        dotProps,
        activeDotProps,
        strokeWidth,
        fillOpacity,
        areaChartProps,
        orientation,
        splitColors,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        rightYAxisLabel,
        withPointLabels,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineAreaChart
            data={data}
            dataKey={dataKey}
            series={series}
            type={type}
            h={h}
            w={w}
            curveType={curveType}
            connectNulls={connectNulls}
            withDots={withDots}
            withGradient={withGradient}
            withLegend={withLegend}
            legendProps={legendProps}
            withTooltip={withTooltip}
            tooltipProps={tooltipProps}
            tooltipAnimationDuration={tooltipAnimationDuration}
            withXAxis={withXAxis}
            withYAxis={withYAxis}
            xAxisProps={xAxisProps}
            yAxisProps={yAxisProps}
            rightYAxisProps={rightYAxisProps}
            withRightYAxis={withRightYAxis}
            gridAxis={gridAxis}
            tickLine={tickLine}
            strokeDasharray={strokeDasharray}
            unit={unit}
            valueFormatter={valueFormatter}
            dotProps={dotProps}
            activeDotProps={activeDotProps}
            strokeWidth={strokeWidth}
            fillOpacity={fillOpacity}
            areaChartProps={areaChartProps}
            orientation={orientation}
            splitColors={splitColors}
            gridColor={gridColor}
            textColor={textColor}
            referenceLines={referenceLines}
            xAxisLabel={xAxisLabel}
            yAxisLabel={yAxisLabel}
            rightYAxisLabel={rightYAxisLabel}
            withPointLabels={withPointLabels}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default AreaChart;
