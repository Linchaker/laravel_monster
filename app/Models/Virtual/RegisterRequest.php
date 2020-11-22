<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Example register request",
 *     description="Some simple request register as example",
 * )
 */
class RegisterRequest
{
    /**
     * @OA\Property(
     *     title="Email",
     *     description="User email",
     *     example="123@123.com",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="Password",
     *     description="User password",
     *     example="12345678",
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *     title="Password confirmation",
     *     description="User password confirmation",
     *     example="12345678",
     * )
     *
     * @var string
     */
    public $password_confirmation;
}
