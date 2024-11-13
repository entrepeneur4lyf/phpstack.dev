import React from 'react';
import { Container, Grid, Skeleton } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function GridAsymmetrical() {
  const { items } = useComponent();

  const primaryItem = items[0];
  const secondaryItems = items.slice(1);

  return (
    <Container size="lg" py="xl">
      <Grid gutter="md">
        <Grid.Col span={{ base: 12, md: 6, lg: 8 }}>
          <Skeleton height={440} radius="md" animate={false} />
        </Grid.Col>
        <Grid.Col span={{ base: 12, md: 6, lg: 4 }}>
          <Grid gutter="md">
            <Grid.Col>
              <Skeleton height={210} radius="md" animate={false} />
            </Grid.Col>
            <Grid.Col>
              <Skeleton height={210} radius="md" animate={false} />
            </Grid.Col>
          </Grid>
        </Grid.Col>
      </Grid>
    </Container>
  );
}
