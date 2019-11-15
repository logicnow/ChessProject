package com.solarwindsmsp.chess;

import java.util.HashMap;

public class ValidatorFactory {

    private static final HashMap<String, PieceValidatorInterface> validatorMap = new HashMap<>();

    public PieceValidatorInterface getValidator(String type) {

        if (type == null) {
            return null;
        }

        if (type.equalsIgnoreCase("Pawn")) {
            PawnValidator validator = (PawnValidator) validatorMap.get("pawn");
            if (validator == null) {
                validator = new PawnValidator();
                validatorMap.put("pawn", validator);
            }

            return validator;
        }

        return null;
    }
}
