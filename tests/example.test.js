const example = require('../src/example');

test('example adds 1 + 2 to equal 3', () => {
  expect(example(1, 2)).toBe(3);
});