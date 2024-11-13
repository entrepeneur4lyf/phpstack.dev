import React from 'react';
import { Container, Title, Text, Button } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function HeroContentLeft() {
  const { hero } = useComponent();

  return (
    <div className="min-h-[calc(100vh-80px)] bg-gray-50 dark:bg-gray-900">
      <Container size="lg" className="h-full">
        <div className="h-full flex flex-col justify-center py-16 max-w-[600px]">
          <Title className="text-4xl lg:text-5xl font-bold leading-tight">
            {hero.title}
          </Title>

          <Text c="dimmed" mt="md">
            {hero.description}
          </Text>

          <Button
            variant="filled"
            size="lg"
            radius="xl"
            className="self-start mt-8 bg-blue-600 hover:bg-blue-700"
          >
            {hero.primaryAction}
          </Button>
        </div>
      </Container>
    </div>
  );
}
