import React from 'react';
import { Title, Text, Button, Container, Group } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function ServerOverload() {
  const { error } = useComponent();

  return (
    <Container className="py-16">
      <div className="text-center">
        <Title className="text-3xl font-bold">
          {error.title}
        </Title>
        
        <Text c="dimmed" size="lg" className="max-w-[500px] mx-auto mt-4">
          {error.description}
        </Text>
        
        <Group justify="center" mt="xl">
          <Button 
            size="md" 
            variant="filled"
            className="bg-blue-600 hover:bg-blue-700"
            onClick={() => window.location.reload()}
          >
            {error.action}
          </Button>
        </Group>
      </div>
    </Container>
  );
}
