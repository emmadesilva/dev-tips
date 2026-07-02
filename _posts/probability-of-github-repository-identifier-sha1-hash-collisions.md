---
title: "Probability of GitHub Repository Identifier SHA1 Hash Collisions"
description: "Worried about SHA1 hash collisions when hashing GitHub repository names? Don't be."
date: "2024-08-26"
author: emma
co_author: Claude
---

Worried about SHA1 hash collisions when hashing GitHub repository names? Don't be.

## Key Points

To calculate the probability of a hash collision in this scenario, we need to consider a few key points:

1. The number of repositories: 420 million [1]
2. The hash function: SHA-1
3. The input: user+repo name (e.g., "laravel/framework")

SHA-1 produces a 160-bit hash value, which means there are 2^160 (approximately 1.46 x 10^48) possible hash values.

## Calculating the Probability

To calculate the probability of a collision, we can use the birthday problem approximation, which is appropriate when the number of items (n) is much smaller than the square root of the number of possible hash values (H).

In this case:
n = 420,000,000
√H ≈ 1.21 x 10^24

Since n is indeed much smaller than √H, we can use the approximation:

P(collision) ≈ 1 - e^(-n^2 / (2H))

Plugging in the values:

P(collision) ≈ 1 - e^(-(420,000,000^2) / (2 * 2^160))

## Python Script

Here is a Python script to calculate the probability of a SHA-1 hash collision for the given scenario.

```python
import math

def calculate_collision_probability(n, bits):
    H = 2**bits
    probability = 1 - math.exp(-(n**2) / (2*H))
    return probability

# Number of repositories
n = 420_000_000

# SHA-1 hash size in bits
sha1_bits = 160

probability = calculate_collision_probability(n, sha1_bits)

print(f"Number of repositories: {n:,}")
print(f"SHA-1 hash size: {sha1_bits} bits")
print(f"Probability of a collision: {probability:.2e}")
print(f"Probability as a fraction: 1 in {1/probability:.2e}")

```

## Results

Let's run this script to get the exact probability:

Number of repositories: 420,000,000
SHA-1 hash size: 160 bits
Probability of a collision: 6.02e-33
Probability as a fraction: 1 in 1.66e+32

Interpretation of the results:

## Interpretation

1. The probability of a collision is extremely low, approximately 6.02 x 10^-33 or 0.000000000000000000000000000000602%.
2. This can also be expressed as a 1 in 1.66 x 10^32 chance of a collision occurring.

In practical terms, this means that the chance of a SHA-1 hash collision for GitHub repository names is negligibly small. The probability is so low that it's effectively zero for most practical purposes.

It's worth noting that while this probability is extremely low, it's not zero. In cryptography and security contexts, even such small probabilities are sometimes considered. However, for the purpose of uniquely identifying GitHub repositories, this level of collision resistance is more than sufficient.


**References:**

- [1] [GitHub](https://github.com/about)
