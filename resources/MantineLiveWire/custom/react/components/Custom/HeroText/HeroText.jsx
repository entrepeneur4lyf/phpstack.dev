import React from 'react';
import { Container, Title, Text, Button, Group } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function HeroText() {
  const { hero } = useComponent();

  return (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900">
      <Container size="md" className="h-full">
        <div className="h-full flex flex-col justify-center items-center text-center py-16">
          <Title className="text-4xl lg:text-5xl font-bold leading-tight max-w-[800px]">
            {hero.title}
          </Title>

          <Text c="dimmed" mt="md" size="lg" className="max-w-[600px]">
            {hero.description}
          </Text>

          <Group mt={30}>
            <Button size="lg" className="bg-blue-600 hover:bg-blue-700">
              {hero.primaryAction}
            </Button>
            <Button size="lg" variant="default">
              {hero.secondaryAction}
            </Button>
          </Group>
        </div>
      </Container>
    </div>
  );
}
