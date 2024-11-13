import React from 'react';
import { Container, Grid, Skeleton } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function Subgrid() {
  const { items } = useComponent();

  return (
    <Container size="lg" py="xl">
      <Grid gutter="md">
        {[...Array(3)].map((_, index) => (
          <Grid.Col key={index} span={{ base: 12, sm: 4 }}>
            <Grid gutter="md">
              <Grid.Col>
                <Skeleton height={280} radius="md" animate={false} />
              </Grid.Col>
              <Grid.Col span={6}>
                <Skeleton height={120} radius="md" animate={false} />
              </Grid.Col>
              <Grid.Col span={6}>
                <Skeleton height={120} radius="md" animate={false} />
              </Grid.Col>
            </Grid>
          </Grid.Col>
        ))}
      </Grid>
    </Container>
  );
}
